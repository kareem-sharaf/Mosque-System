<!-- Navbar Section -->
<div class="bg-[#8B0000] text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex justify-between items-center">
            <!-- Logo or Title -->
            <div class="text-3xl font-extrabold">
                <a href="{{ url('/Home') }}" class="text-white hover:text-[#A52A2A] transition duration-300">
                    جامع عمر الفاروق
                </a>
            </div>

            <!-- Navbar Links -->
            <div class="space-x-6 flex text-lg">
                <a href="{{ url('/home') }}" class="hover:text-[#A52A2A] transition duration-300">Home</a>
                <a href="{{ url('/students') }}" class="hover:text-[#A52A2A] transition duration-300">Students</a>
                <a href="{{ url('/tasks') }}" class="hover:text-[#A52A2A] transition duration-300">Tasks</a>
                <a href="{{ url('/profile') }}" class="hover:text-[#A52A2A] transition duration-300">Profile</a>
                <a href="{{ route('logout') }}" class="hover:text-[#A52A2A] transition duration-300">Log Out</a>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="relative z-10 flex flex-col items-center px-8 py-16 text-center bg-white shadow-xl rounded-2xl dark:bg-gray-800 dark:text-gray-200 mt-8 mx-4 lg:mx-auto max-w-4xl">
    <!-- Title Section -->
    <h1 class="text-5xl font-extrabold text-[#8B0000] mb-8">
        Welcome to جامع عمر الفاروق
    </h1>
    <!-- Subtitle Section -->
    <p class="text-lg text-gray-700 dark:text-gray-300 mb-6">
        A place to learn, grow, and connect with the community.
    </p>
    <!-- Call-to-Action Buttons -->
    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-6">
        <a href="{{ url('/students') }}"
            class="bg-[#8B0000] text-white px-8 py-3 rounded-lg shadow-md hover:bg-[#A52A2A] transition duration-300">
            View Students
        </a>
        <a href="{{ url('/tasks') }}"
            class="bg-gray-700 text-white px-8 py-3 rounded-lg shadow-md hover:bg-gray-600 transition duration-300">
            View Tasks
        </a>
    </div>
</div>
