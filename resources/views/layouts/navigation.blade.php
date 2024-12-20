<nav x-data="{ open: false }" class="bg-navbarBg text-navbarText border-b border-gray-200 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">



            <nav x-data="{ open: false }" class="nav nav-striped nav-hover">



                <nav class="flex space-x-10 rtl:space-x-reverse">



                    <x-nav-link :href="route('students.index')" :active="request()->routeIs('students.index')">
                        <i class="fas fa-file-alt"> {{ __('عرض الطلاب') }}</i>
                    </x-nav-link>
                    <x-nav-link :href="route('reports.index')" :active="request()->routeIs('reports.index')">
                        <i class="fas fa-users"> {{ __('التقارير') }}</i>
                    </x-nav-link>

                </nav>




                <!-- إعدادات المستخدم -->
                <div class="flex items-center space-x-4 rtl:space-x-reverse">
                    <x-dropdown align="right" width="48">

                        <x-slot name="trigger">
                            <button
                                class="flex items-center text-sm font-medium text-black hover:bg-gray-300 transition duration-300 ease-in-out px-3 py-2 rounded-md focus:outline-none bg-transparent">
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="ml-2 h-4 w-4 fill-current" viewBox="0 0 50 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="bg-white shadow-lg rounded-md w-48">
                                <form method="POST" action="{{ route('logout') }}" class="block">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();"
                                        class="block text-black hover:bg-gray-200 px-4 py-2 rounded-md">
                                        {{ __('تسجيل الخروج') }}
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </x-slot>

                    </x-dropdown>
                </div>


        </div>
    </div>
</nav>
