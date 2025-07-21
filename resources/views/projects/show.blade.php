<x-app-layout>
    <div class="flex bg-gray-100 min-h-screen w-full">
        <x-aside /> <!-- Your sidebar component -->

        <div class="flex-1 p-6">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold">{{ $project->title }}</h1>
                <div>
                    <a href="{{ route('projects.edit', $project->id) }}"
                        class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Edit Project</a>
                    <a href="{{ route('projects.index') }}" class="ml-2 text-sm text-gray-600 border p-2">← Back to
                        Projects</a>
                </div>
            </div>

            <!-- Grid Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <!-- Project Information -->
                <div class="bg-white p-4 shadow rounded">
                    <h2 class="text-lg font-medium mb-2">Project Information</h2>
                    <p class="text-sm text-gray-600 mb-1"><strong>Description:</strong> {{ $project->description }}</p>
                    <p class="text-sm"><strong>Deadline:</strong> {{ $project->deadline }}</p>
                    <p class="text-sm"><strong>Status:</strong>
                        <span class="inline-block px-2 py-1 bg-purple-100 text-purple-700 rounded text-xs">
                            {{ ucfirst($project->status->label()) }}
                        </span>
                    </p>
                    <p class="text-sm text-gray-500 mt-2">Created: {{ $project->created_at->format('M d, Y h:i A') }}
                    </p>
                </div>

                <!-- Assigned User -->
                <div class="bg-white p-4 shadow rounded">
                    <h2 class="text-lg font-medium mb-2">Assigned User</h2>
                    <p><strong>Name:</strong> {{ $project->user->name }}</p>
                    <p><strong>Email:</strong> {{ $project->user->email }}</p>
                    <p><strong>Phone:</strong> {{ $project->user->phone_number ?? '-' }}</p>
                </div>

                <!-- Client Info -->
                <div class="bg-white p-4 shadow rounded">
                    <h2 class="text-lg font-medium mb-2">Client Information</h2>
                    <p><strong>Company:</strong> {{ $project->client->company_name }}</p>
                    <p><strong>Contact Person:</strong> {{ $project->client->name }}</p>
                    <p><strong>Email:</strong> {{ $project->client->email }}</p>
                    <p><strong>Phone:</strong> {{ $project->client->phone_number }}</p>
                </div>

                <!-- Tasks Info -->
                <div class="bg-white p-4 shadow rounded">
                    <h2 class="text-lg font-medium mb-2">Tasks Information</h2>
                    <p><strong>Total Tasks:</strong> {{ $project->tasks->count() }}</p>
                    <ul class="mt-2 space-y-1 text-sm">
                        @foreach($project->tasks as $task)
                            <li class="flex justify-between items-center">
                                {{ $task->title }}
                                <span class="text-xs px-2 py-1 bg-gray-200 rounded">{{ ucfirst($task->status) }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- Company Address -->
            <div class="col-span-1 md:col-span-2 bg-white p-4 shadow rounded">
                <h2 class="text-lg font-medium mb-2">Company Address</h2>
                <p class="text-sm text-gray-700">{{ $project->client->company_address }}</p>
            </div>


            <!-- Task Table -->
            <div class="bg-white p-4 shadow rounded mt-4">
                <h2 class="text-lg font-medium mb-4">Project Tasks</h2>
                <table class="w-full text-sm text-left">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700">
                            <th class="p-2">Task</th>
                            <th class="p-2">Assigned To</th>
                            <th class="p-2">Status</th>
                            <th class="p-2">Deadline</th>
                            <th class="p-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($project->tasks as $task)
                            <tr class="border-t">
                                <td class="p-2">{{ $task->title }}</td>
                                <td class="p-2">{{ $task->user->name ?? 'N/A' }}</td>
                                <td class="p-2">
                                    <span
                                        class="text-xs px-2 py-1 rounded bg-gray-100 text-gray-800">{{ ucfirst($task->status) }}</span>
                                </td>
                                <td class="p-2">{{ $task->deadline }}</td>
                                <td class="p-2">
                                    <a href="{{ route('tasks.show', $task->id) }}"
                                        class="text-blue-600 hover:underline">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>