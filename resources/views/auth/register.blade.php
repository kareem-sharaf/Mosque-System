<x-guest-layout>
    <!-- حاوية الصفحة الرئيسية -->
    <div class="login-container">

        <!-- عنوان الصفحة -->
        <header class="text-center mb-6">
            <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-200">جامع عمر الفاروق</h1>
            <p class="text-lg text-gray-600 dark:text-gray-400 mt-2">إنشاء حساب جديد للانضمام إلى النظام</p>
        </header>

        <!-- البطاقة الرئيسية لإنشاء الحساب -->
        <div class="login-card">
            <!-- عنوان البطاقة -->
            <h2 class="login-title text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">إنشاء حساب جديد</h2>

            <!-- نموذج إنشاء الحساب -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- الاسم الكامل -->
                <div class="mb-4">
                    <x-input-label for="name" :value="'الاسم الكامل'" />
                    <x-text-input id="name" class="form-control w-full" type="text" name="name"
                        :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- كلمة المرور -->
                <div class="mb-4">
                    <x-input-label for="password" :value="'كلمة المرور'" />
                    <x-text-input id="password" class="form-control w-full" type="password" name="password" required
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- تأكيد كلمة المرور -->
                <div class="mb-4">
                    <x-input-label for="password_confirmation" :value="'تأكيد كلمة المرور'" />
                    <x-text-input id="password_confirmation" class="form-control w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- زر إنشاء الحساب -->
                <div class="mt-6">
                    <button type="submit" class="btn-danger w-full text-center py-2">إنشاء الحساب</button>
                </div>
            </form>

            <!-- روابط إضافية -->
            <div class="text-center mt-4">
                <p class="text-sm text-gray-600 dark:text-gray-400">هل لديك حساب بالفعل؟
                    <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">تسجيل الدخول</a>
                </p>
            </div>
        </div>
    </div>

    <!-- تضمين ملف CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</x-guest-layout>
