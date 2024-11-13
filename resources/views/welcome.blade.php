<!DOCTYPE html>

<head>
    <!-- Metadata -->
    <meta charset="UTF-8">
    <title>KarmoVsky</title>

    <!-- Styles and Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <!-- Additional Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body class="font-sans antialiased bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200">





    <!-- Buttons Section -->
    <div
        class="relative z-10 flex flex-col items-center px-8 py-16 text-center bg-white shadow-xl rounded-2xl dark:bg-gray-800 dark:text-gray-200">

        <h1 class="text-5xl font-extrabold text-[#8B0000] mb-20">
            جامع عمر الفاروق
        </h1>

        <div class="flex flex-col md:flex-row space-y-8 md:space-y-0 md:space-x-10">
            @if (Route::has('login'))
                @auth
                    <!-- Home Button -->
                    <a href="{{ route('students.index') }}"
                        class="rounded-full px-12 py-6 text-white bg-[#8B0000] hover:bg-[#A52A2A] font-semibold text-lg shadow-lg transition-transform transform hover:scale-105">
                        Home
                    </a>
                @else
                    <!-- Login Button -->
                    <a href="{{ route('login') }}" <x-primary-button class="ms-3">
                        {{ __('Log in') }}
                        </x-primary-button>
                    </a>

                    <!-- Register Button -->
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" <x-primary-button class="ms-3">
                            {{ __('Register') }}
                            </x-primary-button>
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </div>


    </div>
    </div>
</body>

</html>
