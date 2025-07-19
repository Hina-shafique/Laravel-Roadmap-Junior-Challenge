<x-app-layout>
    <div class="flex h-screen bg-gray-100">
        <x-aside></x-aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-xl font-semibold">Clients</h1>
                <div class="flex gap-2">
                    <a href={{ route('clients.create') }}
                        class="bg-indigo-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm">+ Add
                        Client</a>
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
                            <th class="px-6 py-3">Actions</th>
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
                                <td class="px-6 py-4 flex space-x-2">
                                    <a href="{{ route('clients.edit', $client) }}"
                                        class="text-blue-500 hover:text-blue-700">
                                        ✏️
                                    </a>
                                    <form action="{{ route('clients.destroy', $client) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">🗑️</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    <div class="mt-4">
        {{ $clients->links() }}
    </div>
</x-app-layout>