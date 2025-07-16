<x-app-layout>
    <div class="flex h-screen bg-gray-100 w-full">
        <x-aside></x-aside>

        <!-- Main Content -->

        <div class="max-w-5xl mx-auto p-6 bg-white shadow-md rounded-lg mt-6">
            <form method="POST" action="{{ route('clients.store') }}">
                @csrf
                <div>
                    <x-forms.input label="Contact Name" name="name" placeholder="Enter contact name" />
                </div>
                <div>
                    <x-forms.input label="Contact Email" name="email" placeholder="Enter contact email" />
                </div>
                <div>
                    <x-forms.input label="Contact Phone Number" name="phone_number"
                        placeholder="Enter contact phone number" />
                </div>
                <div>
                    <x-forms.input label="Company Name" name="company_name" placeholder="Enter company name" />
                </div>
                <div>
                    <x-forms.input label="Company Address" name="company_address" placeholder="Enter company address" />
                </div>
                <div>
                    <x-forms.input label="Company City" name="company_city" placeholder="Enter company city" />
                </div>
                <div>
                    <x-forms.input label="Company Zip" name="company_zip" placeholder="Enter company zip" />
                </div>

                <!-- Submit -->
                <div class="mt-6">
                    <x-primary-button class="w-full justify-center">
                        Save Client
                    </x-primary-button>
                    <x-secondary-button class="w-full justify-center mt-2">
                        <a href="{{ route('clients.index') }}">Cancel</a>
                    </x-secondary-button>
                </div>
            </form>
        </div>
</x-app-layout>