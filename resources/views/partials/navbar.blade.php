<div class="px-5">
    <header class="max-w-6xl mx-auto py-6 bg-white rounded-b-3xl hidden lg:flex justify-center">
        <a href="/" wire:navigate class="inline-block">
            <img src="{{ asset('img/logo.svg') }}" class="w-[150px] mx-auto" alt="">
        </a>
    </header>
</div>

<div class="px-5">
    <nav class="max-w-6xl mx-auto bg-white py-3 px-4 mt-4 rounded-2xl">
        <div class="flex flex-wrap justify-between items-center">
            <a href="/" wire:navigate>
                <img src="{{ asset('img/logo.svg') }}" class="w-20 lg:hidden" alt="">
            </a>
            <div class="flex items-center">
                <div class="lg:hidden">
                    @livewire('cart.icon')
                </div>

                <div
                    class="hs-dropdown relative lg:hidden inline-flex [--trigger:hover] [--placement:bottom-right] group ml-4 mr-2">
                    <button id="dropdownProfile" class="hs-dropdown-toggle">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>
                    <div
                        class="hs-dropdown-menu w-40 transition-[opacity,margin] hs-dropdown-open:opacity-100 opacity-0 hidden z-10 !-mt-4">
                        <div class="hs-dropdown-open:ease-in hs-dropdown-open:opacity-100 hs-dropdown-open:scale-100 transition ease-out opacity-0 scale-95 duration-200 mt-2 origin-top-right min-w-[5rem] bg-white shadow-md rounded-lg p-2"
                            aria-labelledby="dropdownProfile" data-hs-transition>
                            @if (Auth::check() || Auth::user())
                                @if (Auth::user()->role == 1)
                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 font-semibold"
                                        href="{{ route('dashboard') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5 flex-none">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                                        </svg>
                                        Admin
                                    </a>
                                @endif
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 font-semibold {{ request()->routeIs('user.dashboard') ? 'bg-gray-100' : 'hover:bg-gray-100' }}"
                                    href="{{ route('user.dashboard') }}" wire:navigate>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 flex-none	">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                    Dashboard
                                </a>
                                <button
                                    class="flex items-center gap-x-3.5 w-full py-2 px-3 rounded-md text-sm text-gray-800 font-semibold hover:bg-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 flex-none">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                    </svg>

                                    @livewire('auth.logout')
                                </button>
                            @else
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100"
                                    href="{{ route('login') }}" wire:navigate>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 flex-none">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                                    </svg>
                                    Login
                                </a>
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100"
                                    href="{{ route('register') }}" wire:navigate>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 flex-none">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5A3.375 3.375 0 006.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0015 2.25h-1.5a2.251 2.251 0 00-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 00-9-9z" />
                                    </svg>
                                    Register
                                </a>
                            @endif
                        </div>
                    </div>

                </div>
                <button type="button"
                    class="p-2 hover:bg-gray-100 duration-300 rounded-full hs-collapse-toggle lg:hidden"
                    data-hs-collapse="#navbarCollapse">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 hs-collapse-open:hidden">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 hs-collapse-open:block hidden ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div id="navbarCollapse"
                class="hs-collapse hidden overflow-hidden transition-all duration-500 basis-full grow lg:block lg:basis-0">
                <ul class="lg:items-center py-2 flex flex-col lg:flex-row mt-3 lg:mt-0 ">
                    <li>
                        <a href="/" wire:navigate
                            class="navLink {{ request()->routeIs('home') ? 'active' : '' }} ">Home</a>
                    </li>
                    <li>
                        <a href="{{ request()->routeIs('home') ? '#about' : route('home') . '#about' }}"
                            class="navLink">About</a>
                    </li>
                    <li>
                        <a href="{{ request()->routeIs('home') ? '#services' : route('home') . '#services' }}"
                            class="navLink">Services</a>
                    </li>
                    <li>
                        <a href="{{ route('all.products') }}" wire:navigate
                            class="navLink {{ request()->routeIs('all.products') ? 'active' : '' }}">Products</a>
                    </li>
                    <li>
                        <a href="{{ request()->routeIs('home') ? '#contact' : route('home') . '#contact' }}"
                            class="navLink">Contact Us</a>
                    </li>
                    <li>
                        <a href="{{ route('articles') }}" wire:navigate
                            class="navLink  {{ request()->routeIs('articles') ? 'active' : '' }}">Article</a>
                    </li>
                </ul>
            </div>

            <div class="lg:flex items-center gap-x-1 hidden">
                @livewire('cart.icon')
                <div class="hs-dropdown relative inline-flex [--trigger:hover] [--placement:bottom-right] group">
                    <button id="dropdownProfile"
                        class="hs-dropdown-toggle p-2 group-hover:bg-gray-100 rounded-full duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>
                    <div
                        class="hs-dropdown-menu w-40 transition-[opacity,margin] hs-dropdown-open:opacity-100 opacity-0 hidden z-10 !-mt-4">
                        <div class="hs-dropdown-open:ease-in hs-dropdown-open:opacity-100 hs-dropdown-open:scale-100 transition ease-out opacity-0 scale-95 duration-200 mt-2 origin-top-right min-w-[5rem] bg-white shadow-md rounded-lg p-2"
                            aria-labelledby="dropdownProfile" data-hs-transition>
                            @if (Auth::check() || Auth::user())
                                @if (Auth::user()->role == 1)
                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 font-semibold"
                                        href="{{ route('dashboard') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5 flex-none">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                                        </svg>
                                        Admin
                                    </a>
                                @endif
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 font-semibold {{ request()->routeIs('user.dashboard') ? 'bg-gray-100' : 'hover:bg-gray-100' }}"
                                    href="{{ route('user.dashboard') }}" wire:navigate>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 flex-none	">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                    Dashboard
                                </a>
                                <button
                                    class="flex items-center gap-x-3.5 w-full py-2 px-3 rounded-md text-sm text-gray-800 font-semibold hover:bg-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 flex-none">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                    </svg>

                                    @livewire('auth.logout')
                                </button>
                            @else
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100"
                                    href="{{ route('login') }}" wire:navigate>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 flex-none">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                                    </svg>
                                    Login
                                </a>
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100"
                                    href="{{ route('register') }}" wire:navigate>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 flex-none">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5A3.375 3.375 0 006.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0015 2.25h-1.5a2.251 2.251 0 00-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 00-9-9z" />
                                    </svg>
                                    Register
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- <button class="p-2 hover:bg-gray-100 rounded-full duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button> --}}
            </div>
        </div>
    </nav>
</div>
