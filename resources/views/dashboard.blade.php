<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-600 leading-tight">
            {{ __('Laravel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md">
            <div class="p-4 text-xl font-bold">Laravel</div>
            <nav class="space-y-2">
                <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-200">
                    <span class="material-icons mr-2">dashboard</span> Dashboard
                </a>
                <a href="#" class="flex items-center p-2 bg-blue-100 text-blue-700 rounded">
                    <span class="material-icons mr-2">people</span> Users
                </a>
                <a href="clients" class="flex items-center p-2 text-gray-700 hover:bg-gray-200">
                    <span class="material-icons mr-2"></span> Clients
                </a>
                <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-200">
                    <span class="material-icons mr-2">task</span> Tasks
                </a>
                <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-200">
                    <span class="material-icons mr-2">folder</span> Projects
                </a>
            </nav>
        </aside>
</x-app-layout>