<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class=" flex flex-col items-center justify-center m-2">
        <h2 class="text-2xl font-semibold text-center">Login</h2>
        <p class="text-gray-500 text-center mb-6">Sign in to your account</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="your@email.com"
                :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" placeholder="*******" name="password"
                required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div>
            <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">Forgot
                password?</a>
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>
        <div>
            <button type="submit"
                class="w-full bg-indigo-600 mt-4 text-white py-2 rounded-lg hover:bg-indigo-700 transition duration-200">
                Sign In
            </button>
        </div>
    </form>
    <div class="flex flex-col items-center">
        <p class="mt-6 text-sm text-center text-gray-600">
            Don’t have an account? <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">Sign up</a>
        </p>
    </div>
</x-guest-layout>