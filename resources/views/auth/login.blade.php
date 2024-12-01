<x-guest-layout>
    <!-- حاوية الصفحة الرئيسية -->
    <div class="login-container">

        <!-- عنوان الصفحة -->
        <header class="text-center mb-6">
            <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-200">جامع عمر الفاروق</h1>
            <p class="text-lg text-gray-600 dark:text-gray-400 mt-2">مرحبًا بكم في بوابة تسجيل الدخول</p>
        </header>

        <!-- البطاقة الرئيسية لتسجيل الدخول -->
        <div class="login-card">
            <!-- عرض رسالة الجلسة -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- عنوان البطاقة -->
            <h2 class="login-title text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">تسجيل الدخول إلى حسابك
            </h2>

            <!-- نموذج تسجيل الدخول -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- اسم المستخدم -->
                <div class="mb-4">
                    <x-input-label for="name" :value="'اسم المستخدم'" />
                    <x-text-input id="name" class="form-control w-full" type="text" name="name"
                        :value="old('name')" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- كلمة المرور -->
                <div class="mb-4">
                    <x-input-label for="password" :value="'كلمة المرور'" />
                    <x-text-input id="password" class="form-control w-full" type="password" name="password" required
                        autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- زر تسجيل الدخول -->
                <div class="mt-6">
                    <button type="submit" class="btn-danger w-full text-center py-2">تسجيل الدخول</button>
                </div>
            </form>

            <!-- روابط إضافية -->
            <div class="text-center mt-4">
                <p class="text-sm text-gray-600 dark:text-gray-400">هل لديك حساب بالفعل؟
                    <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">إنشاء حساب جديد</a>
                </p>

            </div>
        </div>
    </div>

    <!-- تضمين ملف CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</x-guest-layout>
