<?php

namespace App\Http\Controllers;

use CustomeFacades\App\Services\TaskActivityServices as TaskActivity;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Project;
use App\Models\Client;
use App\Models\User;
use App\Enums\TaskStatus;
use App\Services\TaskLimitService;
use Exception;
use Illuminate\Database\QueryException;
use App\Exceptions\TaskLimitException;
use App\Services\TaskDeadlineLimit;
use Illuminate\Support\Facades\Cache;
use Throwable;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with(['project', 'user', 'client'])->latest()->paginate(10);
        return view('tasks.index', [
            'tasks' => $tasks
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        $users = User::all();
        $clients = Client::all();
        $status = TaskStatus::cases();
        return view('tasks.create', [
            'projects' => $projects,
            'users' => $users,
            'clients' => $clients,
            'status' => $status

        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        StoreTaskRequest $request,
        TaskLimitService $service,
        TaskDeadlineLimit $deadlineLimit,
    ) {
        try {
            $project = Project::findOrFail($request->project_id);
            $service->check($project);
            $deadlineLimit->maxLimit($request->deadline);
            TaskActivity::logActivity('Created task successfully for Id: ' . $request->project_id);
            TaskActivity::logActivity('First log');

            $task = Task::create($request->validated());
            return redirect()
                ->route('tasks.index')
                ->with('success', 'Task created successfully.');

        } catch (TaskLimitException $e) {
            logger()
                ->warning('Task limit exceeded for project ID ' . $request->project_id);
            return redirect()
                ->back()
                ->withErrors(['error' => 'Task limit exceeded for this project.'])
                ->withInput();

        } catch (QueryException $e) {
            logger()->error('Failed to create task: ' . $e->getMessage());
            return redirect()
                ->back()
                ->withErrors(['error' => 'Failed to create task: Try again'])
                ->withInput();

        } catch (Exception $e) {
            logger()->error('Error:' . $e->getMessage());
            return redirect()
                ->back()
                ->withError(['error' => 'not more then one month'])
                ->withInput();
        }


    }


    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $project = Project::find($task->project_id);
        TaskActivity::logActivity('Viewed task with ID: ' . $task->id);

        return view('tasks.show', compact('task', 'project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $projects = Project::all();
        $users = User::all();
        $clients = Client::all();
        $status = TaskStatus::cases();
        return view('tasks.edit', [
            'task' => $task,
            'projects' => $projects,
            'users' => $users,
            'clients' => $clients,
            'status' => $status
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        TaskActivity::logActivity('Updated task with ID: ' . $task->id);
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        TaskActivity::logActivity('Deleted task with ID: ' . $task->id);
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
