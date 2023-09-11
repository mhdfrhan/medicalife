<div class=" lg:hidden px-4 sm:px-6 md:px-8">
    <header class="bg-white py-5 z-[255] lg:z-[155] rounded-b-3xl shadow-md shadow-gray-200/50">
        <div class="flex items-center justify-between px-5 lg:px-8">
            <div class="hidden lg:block">
                <h5 class="text-xl font-bold">Selamat Datang, <span
                        class="text-blue-green">{{ Auth::user()->name }}</span></h5>
            </div>
            <a href="{{ route('home') }}" wire:navigate class="lg:hidden">
                <img src="{{ asset('img/logo-inline.svg') }}" class="h-10"
                    alt="{{ config('app.name', 'Laravel') }} Logo">
            </a>
            <!-- Navigation Toggle -->
            <button type="button" class="text-gray-500 hover:text-gray-600 lg:hidden" data-hs-overlay="#docs-sidebar"
                aria-controls="docs-sidebar" aria-label="Toggle navigation">
                <span class="sr-only">Toggle Navigation</span>
                <svg class="w-5 h-5" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>
            <!-- End Navigation Toggle -->

            <div class="hidden lg:block">
                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                    <button id="menu-dropdown"
                        class="text-gray-500 font-bold inline-flex items-center gap-3 hs-dropdown-toggle">{{ Auth::user()->name }}
                        <svg class="hs-dropdown-open:rotate-180 duration-300 w-2.5 h-2.5 text-gray-600" width="16"
                            height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </button>
                    <div class="hs-dropdown-menu w-52 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden z-10"
                        aria-labelledby="menu-dropdown">
                        <div class="hs-dropdown-open:ease-in hs-dropdown-open:opacity-100 hs-dropdown-open:scale-100 transition ease-out opacity-0 scale-95 duration-200 mt-2 origin-top-right min-w-0 bg-white shadow-md rounded-lg p-2"
                            aria-labelledby="hs-dropdown-transform-style" data-hs-transition>
                            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 font-semibold"
                                href="{{ route('profile.edit') }}" wire:navigate>
                                Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>

<div id="docs-sidebar"
    class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-500 transform hidden fixed top-0 left-0 bottom-0 z-[250] lg:z-[150] w-72 bg-gray-800 shadow-lg shadow-gray-800/30 pt-7 pb-10 scrollbar-y lg:block lg:translate-x-0 lg:right-auto lg:bottom-0 rounded-r-3xl my-6">
    <div class="p-6 w-full">
        <a href="{{ route('home') }}" wire:navigate>
            <img src="{{ asset('img/logo-inline.svg') }}" class="h-10" alt="{{ config('app.name', 'Laravel') }} Logo">
        </a>
    </div>
    <nav class="hs-accordion-group p-6 pt-3 w-full flex flex-col min-h-0 flex-wrap h-full">
        <div class="flex-1 overflow-y-auto flex flex-col pb-5">
            <ul class="space-y-1.5">
                <div>
                    <p class="text-gray-400 text-sm font-semibold	">Home Page</p>
                </div>
                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 pl-8 {{ request()->routeIs('dashboard') ? 'bg-gray-700' : '' }} text-sm text-gray-300 rounded-lg hover:bg-gray-700 font-semibold {{ request()->routeIs('dashboard') ? 'text-blue-green' : '' }}"
                        href="{{ route('dashboard') }}" wire:navigate>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-pie-chart">
                            <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                            <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                        </svg>
                        Dashboard
                    </a>
                </li>

                <li class="hs-accordion {{ request()->is('dashboard/e-commerce*') ? 'active' : '' }}"
                    id="nav-ecommerce">
                    <a class="hs-accordion-toggle flex items-center gap-x-3.5 py-2 px-3 hs-accordion-active:text-blue-green text-sm text-gray-300 rounded-lg  {{ request()->is('dashboard/e-commerce*') ? 'bg-gray-700' : 'hover:bg-gray-700' }} font-semibold duration-300"
                        href="javascript:;">
                        <div class="flex items-center gap-x-2">
                            <svg class="hs-accordion-active:rotate-0 -rotate-90 duration-300 ml-auto block w-2.5 h-2.5 text-gray-400 group-hover:text-gray-400"
                                viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-shopping-cart">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                        </div>
                        E commerce
                    </a>

                    <div id="nav-ecommerce"
                        class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300  {{ request()->is('dashboard/e-commerce*') ? '' : 'hidden' }}">
                        <ul class="pt-2 pl-9">
                            <li>
                                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-300 rounded-lg font-semibold {{ request()->routeIs('dashboard.products') ? 'bg-gray-700' : 'hover:bg-gray-700' }}"
                                    href="{{ route('dashboard.products') }}" wire:navigate>
                                    Semua Produk
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-300 rounded-lg font-semibold {{ request()->routeIs('tambah.products') ? 'bg-gray-700' : 'hover:bg-gray-700' }}"
                                    href="{{ route('tambah.products') }}" wire:navigate>
                                    Tambah Produk
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-300 rounded-lg font-semibold {{ request()->routeIs('dashboard.orders') ? 'bg-gray-700' : 'hover:bg-gray-700' }}"
                                    href="{{ route('dashboard.orders') }}" wire:navigate>
                                    Order
                                    @livewire('products.orders-icon')
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 pl-8 {{ request()->routeIs('message') ? 'bg-gray-700' : '' }} text-sm text-gray-300 rounded-lg hover:bg-gray-700 font-semibold {{ request()->routeIs('message') ? 'text-blue-green' : '' }}"
                        href="{{ route('message') }}" wire:navigate>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-[18px] h-[18px]">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                        </svg>
                        Messages
                        @livewire('contact.icon')
                    </a>
                </li>

                <li class="hs-accordion {{ request()->is('dashboard/article*') ? 'active' : '' }}"
                    id="nav-ecommerce">
                    <a class="hs-accordion-toggle flex items-center gap-x-3.5 py-2 px-3 hs-accordion-active:text-blue-green text-sm text-gray-300 rounded-lg  {{ request()->is('dashboard/article*') ? 'bg-gray-700' : 'hover:bg-gray-700' }} font-semibold duration-300"
                        href="javascript:;">
                        <div class="flex items-center gap-x-2">
                            <svg class="hs-accordion-active:rotate-0 -rotate-90 duration-300 ml-auto block w-2.5 h-2.5 text-gray-400 group-hover:text-gray-400"
                                viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-[18px] h-[18px]">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                            </svg>
                        </div>
                        Artikel
                    </a>

                    <div id="nav-ecommerce"
                        class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300  {{ request()->is('dashboard/article*') ? '' : 'hidden' }}">
                        <ul class="pt-2 pl-9">
                            <li>
                                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-300 rounded-lg font-semibold {{ request()->routeIs('dashboard.article') ? 'bg-gray-700' : 'hover:bg-gray-700' }}"
                                    href="{{ route('dashboard.article') }}" wire:navigate>
                                    Semua Artikel
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-300 rounded-lg font-semibold {{ request()->routeIs('tambah.article') ? 'bg-gray-700' : 'hover:bg-gray-700' }}"
                                    href="{{ route('tambah.article') }}" wire:navigate>
                                    Tambah Artikel
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <div class="!mt-8">
                    <p class="text-gray-400 text-sm font-semibold	">Settings</p>
                </div>
                <li class="hs-accordion {{ request()->is('dashboard/users*') ? 'active' : '' }}" id="nav-users">
                    <a class="hs-accordion-toggle flex items-center gap-x-3.5 py-2 px-3 hs-accordion-active:text-blue-green text-sm text-gray-300 rounded-lg  {{ request()->is('dashboard/users*') ? 'bg-gray-700' : 'hover:bg-gray-700' }} font-semibold duration-300"
                        href="javascript:;">
                        <div class="flex items-center gap-x-2">
                            <svg class="hs-accordion-active:rotate-0 -rotate-90 duration-300 ml-auto block w-2.5 h-2.5 text-gray-400 group-hover:text-gray-400"
                                viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" class="w-[18px] h-[18px]">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                        </div>
                        Users
                    </a>

                    <div id="nav-users"
                        class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300  {{ request()->is('dashboard/users*') ? '' : 'hidden' }}">
                        <ul class="pt-2 pl-9">
                            <li>
                                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-300 rounded-lg font-semibold {{ request()->routeIs('all.users') ? 'bg-gray-700' : 'hover:bg-gray-700' }}"
                                    href="{{ route('all.users') }}" wire:navigate>
                                    Semua User
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-300 rounded-lg font-semibold {{ request()->routeIs('tambah.user') ? 'bg-gray-700' : 'hover:bg-gray-700' }}"
                                    href="{{ route('tambah.user') }}" wire:navigate>
                                    Tambah User
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="hs-accordion {{ request()->is('dashboard/admin*') ? 'active' : '' }}" id="nav-admins">
                    <a class="hs-accordion-toggle flex items-center gap-x-3.5 py-2 px-3 hs-accordion-active:text-blue-green text-sm text-gray-300 rounded-lg  {{ request()->is('dashboard/admin*') ? 'bg-gray-700' : 'hover:bg-gray-700' }} font-semibold duration-300"
                        href="javascript:;">
                        <div class="flex items-center gap-x-2">
                            <svg class="hs-accordion-active:rotate-0 -rotate-90 duration-300 ml-auto block w-2.5 h-2.5 text-gray-400 group-hover:text-gray-400"
                                viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-[18px] h-[18px]">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                            </svg>
                        </div>
                        Admins
                    </a>

                    <div id="nav-admins"
                        class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300  {{ request()->is('dashboard/admin*') ? '' : 'hidden' }}">
                        <ul class="pt-2 pl-9">
                            <li>
                                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-300 rounded-lg font-semibold {{ request()->routeIs('all.admin') ? 'bg-gray-700' : 'hover:bg-gray-700' }}"
                                    href="{{ route('all.admin') }}" wire:navigate>
                                    Semua Admin
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-300 rounded-lg font-semibold {{ request()->routeIs('tambah.admin') ? 'bg-gray-700' : 'hover:bg-gray-700' }}"
                                    href="{{ route('tambah.admin') }}" wire:navigate>
                                    Tambah Admin
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
        <div class="text-gray-300 pb-10 mb-4">
            <div class="p-4 2xl:p-5 bg-blue-500 rounded-2xl">
                <h6 class="text-white font-bold text-lg 2xltext-xl">Dibuat dan dikembangkan oleh Medicalife</h6>
            </div>
            <div
                class="hs-dropdown relative w-full [--placement:right-top] [--trigger:hover] border-t border-gray-700 mt-5">
                <button id="profileDropUp" type="button"
                    class="hs-dropdown-toggle w-full flex items-center gap-4 mt-4 justify-between cursor-pointer hover:bg-gray-700 duration-300 px-2 py-2 rounded-lg">
                    <div class="inline-flex items-center gap-3">
                        <div>
                            <h5 class="text-sm text-left font-semibold">{{ Auth::user()->name }}</h5>
                            <p class="text-[13px]">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-[16px] h-[16px]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                        </svg>

                    </div>
                </button>
                <div class="hs-dropdown-menu w-40 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden z-10 bg-gray-800 shadow-lg shadow-gray-700 rounded-lg p-2 !-ml-2"
                    aria-labelledby="profileDropUp">
                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-300 {{ request()->routeIs('profile.edit') ? 'bg-gray-700' : 'hover:bg-gray-700' }}"
                        href="{{ route('profile.edit') }}" wire:navigate>
                        Profile
                    </a>
                    <button
                        class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-300 hover:bg-gray-700 w-full">
                        @livewire('auth.logout')
                    </button>
                </div>
            </div>
        </div>
    </nav>
</div>
