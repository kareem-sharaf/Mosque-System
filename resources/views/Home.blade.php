<!-- Navbar Section -->
<div class="bg-[#8B0000] text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex justify-between items-center">
            <!-- Logo or Title -->
            <div class="text-2xl font-bold">
                <a href="{{ url('/Home') }}" class="text-white hover:text-[#A52A2A]">
                    جامع عمر الفاروق
                </a>
            </div>

            <!-- Navbar Links -->
            <div class="space-x-6 flex">
                <a href="{{ url('/home') }}" class="hover:text-[#A52A2A]">Home</a>
                <a href="{{ url('/students') }}" class="hover:text-[#A52A2A]">Students</a>
                <a href="{{ url('/tasks') }}" class="hover:text-[#A52A2A]">Tasks</a>
                <a href="{{ url('/profile') }}" class="hover:text-[#A52A2A]">Profile</a>
                <a href="{{ route('logout') }}" class="hover:text-[#A52A2A]">Log Out</a>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="relative z-10 flex flex-col items-center px-8 py-16 text-center bg-white shadow-xl rounded-2xl dark:bg-gray-800 dark:text-gray-200 mt-8">
    <!-- Title Section -->
    <h1 class="text-5xl font-extrabold text-[#8B0000] mb-8">
        Welcome to جامع عمر الفاروق
    </h1>
    <!-- Content for the Home Page -->
</div>
