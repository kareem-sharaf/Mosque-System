<x-guest-layout>
        <!-- Registration Form Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 max-w-md w-full">
            <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-gray-100 mb-6">
                {{ __('Create an Account') }}
            </h2>

            <!-- Additional Fonts -->
            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="{{ asset('css/app.css') }}">

            <!-- Tailwind CSS (Direct Link) -->
            <script src="https://cdn.tailwindcss.com"></script>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Full Name')" class="text-gray-700 dark:text-gray-300" />
                    <x-text-input id="name"
                        class="block mt-2 w-full border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm"
                        type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" class="text-gray-700 dark:text-gray-300" />
                    <x-text-input id="password"
                        class="block mt-2 w-full border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm"
                        type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
                    @vite(['resources/css/app.css', 'resources/js/app.js'])
                @endif
                <link rel="stylesheet" href="{{ asset('css/app.css') }}">

                <!-- Confirm Password -->
                <div class="mb-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')"
                        class="text-gray-700 dark:text-gray-300" />
                    <x-text-input id="password_confirmation"
                        class="block mt-2 w-full border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm"
                        type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Register Button -->
                <div class="mt-6">
                    <x-primary-button
                        class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-md shadow-md transition duration-300">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Footer Links -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Already have an account?') }}
                    <a href="{{ route('login') }}" class="text-indigo-600 hover:underline dark:text-indigo-400">
                        {{ __('Log in here') }}
                    </a>
                </p>
            </div>
        </div>
</x-guest-layout>
