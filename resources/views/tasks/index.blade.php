<x-app-layout>
    <div class="flex min-h-screen bg-gray-100 w-full">
        <x-aside /> <!-- Sidebar -->

        <!-- Main content -->
        <div class="flex-1 p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold">Tasks</h1>
                <a href="{{ route('tasks.create') }}"
                    class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">+ Add Task</a>
            </div>

            <!-- Table -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium">Title</th>
                            <th class="px-6 py-3 text-left text-sm font-medium">Description</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-sm">
                        @forelse ($tasks as $task)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <a href="{{ route('tasks.show', $task->id) }}" class="text-blue-600 hover:underline">
                                        {{ $task->title }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 text-gray-700">
                                    {{ \Illuminate\Support\Str::limit($task->description, 100) }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="px-6 py-4 text-center text-gray-500">No tasks found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-4">
        {{ $tasks->links() }}
    </div>
</x-app-layout>