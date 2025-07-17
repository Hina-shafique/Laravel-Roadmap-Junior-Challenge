<!-- Sidebar -->
<aside class="min-h-screen w-64 bg-gray-100 shadow-md flex-shrink-0 flex flex-col p-6 space-y-6">
    <nav class="space-y-2">
        <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6" />
            </svg>
            <span class="material-icons mr-2">Dashboard</span>
        </a>
        <a href="{{ route('users.index') }}" class="flex items-center p-2 bg-blue-100 text-blue-700 rounded">
            <span class="material-icons mr-2">Users</span>
        </a>
        <a href="{{ url('clients') }}" class="flex items-center p-2 rounded 
          {{ request()->is('clients') ? 'bg-black text-indigo-600' : 'text-gray-700 hover:bg-gray-200' }}">
            <span class="material-icons mr-2">Clients</span>
        </a>
        <a href="{{ route('tasks.index') }}" class="flex items-center p-2 text-gray-700 hover:bg-gray-200">
            <span class="material-icons mr-2">Tasks</span>
        </a>
        <a href="{{ route('projects.index') }}" class="flex items-center p-2 text-gray-700 hover:bg-gray-200">
            <span class="material-icons mr-2">Projects</span>
        </a>
    </nav>
</aside>