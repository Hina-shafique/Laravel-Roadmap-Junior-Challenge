<x-app-layout>
    <div class="flex h-screen bg-gray-100 w-full">
        <x-aside></x-aside>

        <!-- Main Content -->

        <div class="max-w-5xl mx-auto p-6 bg-white shadow-md rounded-lg mt-6">
            <form method="POST" action="{{ route('clients.update', $client->id) }}">
                @csrf
                @method('PATCH')
                <div>
                    <x-forms.input label="Contact Name" name="name" placeholder="Enter contact name"
                        value="{{ $client->name }}" />
                </div>
                <div>
                    <x-forms.input label="Contact Email" name="email" placeholder="Enter contact email"
                        value="{{ $client->email }}" />
                </div>
                <div>
                    <x-forms.input label="Contact Phone Number" name="phone_number"
                        placeholder="Enter contact phone number" value="{{ $client->phone_number }}" />
                </div>
                <div>
                    <x-forms.input label="Company Name" name="company_name" placeholder="Enter company name"
                        value="{{ $client->company_name }}" />
                </div>
                <div>
                    <x-forms.input label="Company Address" name="company_address" placeholder="Enter company address"
                        value="{{ $client->company_address }}" />
                </div>
                <div>
                    <x-forms.input label="Company City" name="company_city" placeholder="Enter company city"
                        value="{{ $client->company_city }}" />
                </div>
                <div>
                    <x-forms.input label="Company Zip" name="company_zip" placeholder="Enter company zip"
                        value="{{ $client->company_zip }}" />
                </div>

                <!-- Submit -->
                <div class="mt-6">
                    <x-primary-button class="w-full justify-center">
                        Update Client
                    </x-primary-button>
                    <x-secondary-button class="w-full justify-center mt-2">
                        <a href="{{ route('clients.index') }}">Cancel</a>
                    </x-secondary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>