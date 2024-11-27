<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <!-- Metadata -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جامع الفاروق</title>




    <!-- Tailwind CSS (Direct Link) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body >

    <!-- Header Section -->
    <header class="bg-[#8B0000] text-white py-6 shadow-md">
        <h1 class="text-center text-4xl font-extrabold">
            جامع عمر الفاروق
        </h1>
    </header>

    <!-- Main Content -->
    <main class="flex flex-col items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900">
        <div class="relative z-10 px-8 py-16 text-center bg-white shadow-xl rounded-2xl dark:bg-gray-800">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-8">
                أهلاً وسهلاً في منصة جامع عمر الفاروق
            </h2>

            <div class="flex flex-col md:flex-row space-y-6 md:space-y-0 md:space-x-6">
                @if (Route::has('login'))
                    @auth
                        <!-- Home Button -->
                        <a href="{{ route('students.index') }}"
                            class="rounded-full px-12 py-4 text-white bg-[#8B0000] hover:bg-[#A52A2A] font-semibold text-lg shadow-md transition-transform transform hover:scale-105">
                            الصفحة الرئيسية
                        </a>
                    @else
                        <!-- Login Button -->
                        <a href="{{ route('login') }}"
                            class="rounded-full px-12 py-4 text-white bg-[#8B0000] hover:bg-[#A52A2A] font-semibold text-lg shadow-md transition-transform transform hover:scale-105">
                            تسجيل الدخول
                        </a>

                        <!-- Register Button -->
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="rounded-full px-12 py-4 text-white bg-gray-700 hover:bg-gray-600 font-semibold text-lg shadow-md transition-transform transform hover:scale-105">
                                انشاء حساب
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-200 text-center py-4">
        <p>© {{ date('Y') }} جامع عمر الفاروق. جميع الحقوق محفوظة.</p>
    </footer>
</body>

</html>
