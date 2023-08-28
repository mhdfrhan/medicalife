<div class="w-full lg:w-[30%] p-5">
    <div class="p-5 bg-white rounded-2xl">
        <div class="flex items-center gap-4">
            @if (Auth::user()->image)
                <div class="overflow-hidden rounded-full w-20 h-20 relative group cursor-pointer">
                    <img src="{{ asset('img/profile/' . Auth::user()->image) }}" alt="{{ Auth::user()->name }}"
                        class="w-20 h-20 rounded-full object-cover">
                    <div
                        class="absolute inset-0 flex items-center justify-center bg-black/50 invisible opacity-0 group-hover:visible group-hover:opacity-100 duration-300" wire:click='hapusGambar'>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-red-500">
                            <path fill-rule="evenodd"
                                d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            @else
                <div
                    class="w-20 h-20 bg-gray-200/60 rounded-full flex items-center justify-center text-2xl font-black text-blue-green shrink-0">
                    @auth
                        @php
                            $nama = auth()->user()->name;
                            $namaParts = explode(' ', $nama);
                            $initials = '';
                            
                            // Limit to only two initials
                            $initialsCount = min(count($namaParts), 2);
                            
                            for ($i = 0; $i < $initialsCount; $i++) {
                                $initials .= strtoupper(substr($namaParts[$i], 0, 1));
                            }
                        @endphp
                        {{ $initials }}
                    @endauth
                </div>
            @endif
            <div>
                <h5 class="text-lg font-bold">{{ Auth::user()->name }}</h5>
                <p class="text-sm text-gray-500 mt-1 select-none">Sejak
                    {{ Auth::user()->created_at->diffForHumans() }}</p>
            </div>
        </div>
    </div>
    <div class="p-5 bg-white rounded-2xl mt-4">
        <div class="flex justify-between items-center cursor-pointer hs-collapse-toggle" id="collapse-1"
            data-hs-collapse="#collapse-1-heading">
            <h5 class="label !mb-0 select-none">Menu</h5>
            <svg class="w-3 h-3 text-slate-800 dark:text-white" width="16" height="16" viewBox="0 0 16 16"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" />
            </svg>
        </div>
        <div class="hs-collapse overflow-hidden transition-[height] duration-300" id="collapse-1-heading" wire:ignore>
            <ul class="space-y-1.5 mt-5">
                <li><a href="{{ route('user.dashboard') }}" wire:navigate
                        class="block py-2 px-4 rounded-lg duration-300 select-none capitalize {{ request()->routeIs('user.dashboard') ? 'bg-gray-100 text-blue-green font-bold' : 'hover:bg-gray-100 font-semibold' }}">My
                        Account</a></li>
                <li><a href="{{ route('user.transaction') }}" wire:navigate
                        class="block py-2 px-4 rounded-lg duration-300 select-none capitalize {{ request()->routeIs('user.transaction') ? 'bg-gray-100 text-blue-green font-bold' : 'hover:bg-gray-100 font-semibold' }}">Transactions</a>
                </li>
                <li><a href="{{ route('user.reviews') }}" wire:navigate
                        class="block py-2 px-4 rounded-lg duration-300 select-none capitalize {{ request()->routeIs('user.reviews') ? 'bg-gray-100 text-blue-green font-bold' : 'hover:bg-gray-100 font-semibold' }}">Reviews</a>
                </li>
                <li><a href="{{ route('user.security') }}" wire:navigate
                        class="block py-2 px-4 rounded-lg duration-300 select-none capitalize {{ request()->routeIs('user.security') ? 'bg-gray-100 text-blue-green font-bold' : 'hover:bg-gray-100 font-semibold' }}">account
                        security</a></li>
            </ul>
        </div>
    </div>
</div>
