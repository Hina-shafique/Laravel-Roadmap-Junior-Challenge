<x-app-layout>
    <div
        class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden mb-6">
        <div class="p-6">
            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-6 col-span-2">
                        <h3
                            class="text-lg font-medium text-gray-800  border-b border-gray-200 pb-2">
                            Edit Task</h3>
                    </div>

                    <div>
                        <x-forms.input label="Title" name="title" placeholder="Enter title" value="{{ $task->title }}" />
                    </div>
                    <div>
                        <x-forms.input label="Description" name="description" placeholder="Enter description" value="{{ $task->description }}" />
                    </div>
                    <div>
                        <x-forms.select label="Client" name="client_id" placeholder="Enter client"
                            :options="$clients" :optionKey="'id'" :optionValue="'company_name'" value="{{ $task->client_id }}"/>
                    </div>
                    <div>
                        <x-forms.select label="User" name="user_id" placeholder="Enter user" :options="$users" value="{{ $task->user_id }}"
                            :optionKey="'id'" :optionValue="'name'" />
                    </div>
                    <div>
                        <x-forms.select label="Project" name="project_id" placeholder="Enter Project" :options="$projects" value="{{ $task->project_id }}"
                            :optionKey="'id'" :optionValue="'title'" />
                    </div>
                    <div>
                        <x-forms.input type="date" label="Deadline" name="deadline" placeholder="Enter deadline"  value="{{ $task->deadline }}"/>
                    </div>
                    <div>
                        <x-forms.select label="Status" name="status" placeholder="Enter status" :optionKey="'value'"
                        :options="$status" :optionValue="'name'" value="{{ $task->status->label() }}" />
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="mt-8 pt-5 border-t border-gray-200">
                    <div class="flex justify-end space-x-6 ">
                        <a href="{{ route('tasks.index') }}"
                            class="px-4 py-2 mt-4 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-black  bg-white  hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancel
                        </a>
                        <button type="primary" tag="button" buttonType="submit" class="mt-4 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-black bg-white  hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 my-2">
                            Update Task
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>