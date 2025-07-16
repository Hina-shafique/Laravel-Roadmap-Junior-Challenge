<x-app-layout>
    <div class="flex h-screen bg-gray-100 w-full">
        <x-aside></x-aside>

        <!-- Main Content -->

        <div class="max-w-5xl mx-auto p-6 bg-white shadow-md rounded-lg mt-6">
            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PATCH')
                <div>
                    <x-forms.input label="Contact Name" name="name" placeholder="Enter contact name"
                        value="{{ $user->name }}" />
                </div>
                <div>
                    <x-forms.input label="Contact Email" name="email" placeholder="Enter contact email"
                        value="{{ $user->email }}" />
                </div>
                <div>
                    <x-forms.input label="Contact Phone Number" name="phone_number"
                        placeholder="Enter contact phone number" value="{{ $user->phone_number }}" />
                </div>
                <div>
                    <x-forms.input label="Address" name="address" placeholder="Enter address"
                        value="{{ $user->address }}" />
                </div>
                <div>
                    <x-forms.input label="Terms Accepted Role" name="terms_accepted_role"
                        placeholder="Enter terms accepted role" value="{{ $user->terms_accepted_role }}" />
                </div>

                <!-- Submit -->
                <div class="mt-6">
                    <x-primary-button class="w-full justify-center">
                        Update Client
                    </x-primary-button>
                    <x-secondary-button class="w-full justify-center mt-2">
                        <a href="{{ route('users.index') }}">Cancel</a>
                    </x-secondary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>