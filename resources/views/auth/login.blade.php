<x-guest-layout>
    <!-- Login Form Card -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 max-w-md w-full">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Additional Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Tailwind CSS (Direct Link) -->
        <script src="https://cdn.tailwindcss.com"></script>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-gray-100 mb-6">
            {{ __('Login to Your Account') }}
        </h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Name Address -->
            <div class="mb-4">
                <x-input-label for="name" :value="__('Username')" class="text-gray-700 dark:text-gray-300" />
                <x-text-input id="name"
                    class="block mt-2 w-full border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm"
                    type="text" name="name" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" class="text-gray-700 dark:text-gray-300" />
                <x-text-input id="password"
                    class="block mt-2 w-full border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm"
                    type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Login Button -->
            <div class="mt-6 flex justify-center">
                <x-primary-button
                    class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-md shadow-md transition duration-300">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>

        <!-- Footer Links -->
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                {{ __("Don't have an account?") }}
                <a href="{{ route('register') }}" class="text-indigo-600 hover:underline dark:text-indigo-400">
                    {{ __('Register here') }}
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>
