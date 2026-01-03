<?php 

namespace App\Services;

use App\Models\Project;
use App\Exceptions\TaskLimitException;

class TaskLimitService
{
    public function check(Project $project)
    {
        $taskCount = $project->tasks->count();
        if ($taskCount >= 5) {
            throw new TaskLimitException();
        }
        return false;
    }
}