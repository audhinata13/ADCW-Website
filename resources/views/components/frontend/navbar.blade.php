<nav class="bg-black dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b  dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-center mx-auto p-4">
        {{-- <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
        </a> --}}
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            {{-- <button type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get
                started</button> --}}
            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul
                class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg  md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                <li>
                    <a href="{{ route('frontend.home') }}"
                        class="block text-sm py-2 px-3 text-white rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                        What's New</a>
                </li>
                <li>
                    <a href="{{ route('frontend.event.index') }}"
                        class="block text-sm py-2 px-3 text-white rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Our
                        Festivals</a>
                </li>
                <li>
                    <a href="{{ route('frontend.about') }}"
                        class="block text-sm py-2 px-3 text-white rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About
                        Us & Previous Events</a>
                </li>
                <li>
                    <a href="{{ route('frontend.faq.index') }}"
                        class="block text-sm py-2 px-3 text-white rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">FAQs</a>
                </li>
                <li>
                    <a href="{{ route('frontend.contact') }}"
                        class="block text-sm py-2 px-3 text-white rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact
                        Us</a>
                </li>
                @auth
                    <li class="relative">
                        <button id="notifButton" class="relative flex items-center text-white">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 17h5l-1.403-1.403A2.004 2.004 0 0118 14V9a6 6 0 10-12 0v5c0 .387-.099.762-.287 1.095L4 17h5m6 0a3 3 0 11-6 0">
                                </path>
                            </svg>
                            <span id="notifBadge"
                                class="absolute top-0 right-0 block w-4 h-4 text-xs text-white bg-red-500 rounded-full">{{ $notifications_seen->count() }}</span>
                        </button>

                        <!-- Card List Notification -->
                        <div id="notifCard"
                            class="absolute left-0 w-96 p-4 bg-white border border-gray-200 rounded-lg shadow-lg hidden">
                            <h3 class="font-normal mb-3  text-center">Notifications</h3>

                            <ul id="notifList"
                                class="divide-y divide-gray-200 dark:divide-gray-600 max-h-[600px] overflow-y-auto">
                                @foreach ($notifications as $notification)
                                    <li
                                        class="p-4 mb-3 hover:bg-gray-100 @if ($notification->status == 0) bg-gray-100 rounded-2xl @endif">
                                        <h4 class="text-sm font-bold">{{ $notification->title }}</h4>
                                        <p class="text-xs text-gray-500">{{ $notification->description }}</p>
                                        <div class="block mt-1 text-xs text-gray-400">
                                            {{ $notification->created_at->translatedFormat('d F Y H:i:s') }}</div>
                                        @if ($notification->type === 'payment')
                                            <div class="mt-4">
                                                <a href="{{ $notification->link }}"
                                                    class="px-6 text-sm py-2 bg-[#001A3D] text-white rounded-lg cursor-pointer mt-3">Make
                                                    a Payment Now</a>
                                            </div>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>

                            <div class="text-center py-5">
                                <a href="{{ route('frontend.notifications.seen') }}" class="font-light  text-center">Marked
                                    as Seen</a>
                            </div>
                        </div>

                    </li>
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                            class="flex items-center justify-between w-full py-2 px-3 text-white hover:bg-gray-100 md:hover:bg-transparent md:border-0  md:p-0 md:w-auto dark:text-white  dark:focus:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">{{ auth()->user()->name }}
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 4 4 4-4" />
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar"
                            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownLargeButton">
                                @if (auth()->user()->hasRole('admin'))
                                    <li>
                                        <a href="{{ route('dashboard') }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard
                                            Admin</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ route('frontend.profile.index') }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                                    </li>
                                @endif
                                <li>
                                    <a href="#" onclick="document.getElementById('formLogout').submit()"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logout</a>
                                    <form action="{{ route('logout') }}" method="post" id="formLogout">
                                        @csrf
                                    </form>
                                </li>
                        </div>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</a>
                    </li>

                @endauth
            </ul>
        </div>
    </div>
</nav>
