<x-app-layout>
    <div class="flex h-screen bg-gray-100">
        <x-aside></x-aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-xl font-semibold">Users</h1>
                <div class="flex gap-2">
                    <a href={{ route('clients.create') }}
                        class="bg-indigo-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm">+ Add
                        User</a>
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
                            <th class="px-6 py-3">Address</th>
                            <th class="px-6 py-3">Term Accepted Roll</th>
                            <th class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($users as $user)
                            <tr class="border-t">
                                <td class="px-6 py-4">{{ $user->name }}</td>
                                <td class="px-6 py-4">{{ $user->email }}</td>
                                <td class="px-6 py-4">{{ $user->phone_number }}</td>
                                <td class="px-6 py-4">{{ $user->address }}</td>
                                <td class="px-6 py-4">{{ $user->terms_accepted_role }}</td>
                                <td class="px-6 py-4 flex space-x-2">
                                    <a href="{{ route('users.edit', $user) }}" class="text-blue-500 hover:text-blue-700">
                                        ✏️
                                    </a>
                                    <form action="{{ route('users.destroy', $user) }}" method="POST"
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
        {{ $users->links() }}
    </div>
</x-app-layout>