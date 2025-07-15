<x-app-layout>
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <aside class="min-h-screen w-64 bg-gray-100 shadow-md flex-shrink-0 flex flex-col p-6 space-y-6">
            <nav class="space-y-2">
                <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6" />
                    </svg>
                    <span class="material-icons mr-2">Dashboard</span>
                </a>
                <a href="#" class="flex items-center p-2 bg-blue-100 text-blue-700 rounded">
                    <span class="material-icons mr-2">Users</span>
                </a>
                <a href="{{ url('clients') }}" class="flex items-center p-2 rounded 
          {{ request()->is('clients') ? 'bg-black text-indigo-600' : 'text-gray-700 hover:bg-gray-200' }}">
                    <span class="material-icons mr-2">Clients</span>
                </a>
                <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-200">
                    <span class="material-icons mr-2">Tasks</span>
                </a>
                <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-200">
                    <span class="material-icons mr-2">Projects</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-xl font-semibold">Users</h1>
                <div class="flex gap-2">
                    <button class="bg-indigo-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm">+ Add
                        Client</button>
                    <button class="bg-indigo-600 hover:bg-gray-200 text-white px-4 py-2 rounded text-sm">Show Deleted
                        Users</button>
                </div>
            </div>

            <div class="overflow-x-auto bg-white shadow rounded-lg">
                <table class="min-w-full text-sm text-left">
                    <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-3">Name</th>
                            <th class="px-6 py-3">Email</th>
                            <th class="px-6 py-3">Phone #</th>
                            <th class="px-6 py-3">Company Address</th>
                            <th class="px-6 py-3">Company Name</th>
                            <th class="px-6 py-3">Company city</th>
                            <th class="px-6 py-3">Zip code</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($clients as $client)
                            <tr class="border-t">
                                <td class="px-6 py-4">{{ $client->name }}</td>
                                <td class="px-6 py-4">{{ $client->email }}</td>
                                <td class="px-6 py-4">{{ $client->phone_number }}</td>
                                <td class="px-6 py-4">{{ $client->company_address }}</td>
                                <td class="px-6 py-4">{{ $client->company_name }}</td>
                                <td class="px-6 py-4">{{ $client->company_city}}</td>
                                <td class="px-6 py-4">{{ $client->company_zip }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</x-app-layout>