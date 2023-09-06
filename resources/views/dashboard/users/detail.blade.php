<x-app-layout>
    <x-slot name="title">{{ $title }}</x-slot>

    <div class="flex flex-wrap gap-4 items-center justify-between">
        <h1 class="heading !capitalize !font-extrabold">Profile</h1>
        <div class="flex flex-wrap items-center gap-3 sm:gap-4">
            <a href="{{ route('edit.user', encrypt($user->id)) }}" wire:navigate
                class="py-2.5 px-4 border text-sm rounded-lg border-gray-300 font-bold inline-flex items-center gap-3 text-gray-600 hover:bg-gray-300/60 duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                </svg>

                Reset password
            </a>
        </div>
    </div>

    <div class="mt-14">
			<a href="{{ route('all.users') }}" wire:navigate class="w-14 h-14 flex items-center justify-center rounded-full bg-blue-500 shadow-lg shadow-blue-500/30 text-white">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
					<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
				</svg>				
			</a>
        <div class="flex flex-wrap -mx-5">
            <div class="w-full xl:w-2/3 p-5">
                <div class="bg-white p-5 shadow-lg shadow-gray-200/40 rounded-2xl">
                    <div class="sm:flex items-center gap-5 border-b mb-8 pb-8 border-dashed border-gray-300">
                        @if ($user->image)
                            <img src="{{ asset('img/profile/' . $user->image) }}"
                                class="w-32 h-32 object-cover rounded-full mx-auto sm:mx-0" alt="">
                        @else
                            <div class="w-32 h-32 bg-gray-300 rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="w-10 h-10">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                            </div>
                        @endif
                        <div class="text-center sm:text-left mt-4 sm:mt-0 ">
                            <h5 class="text-2xl md:text-3xl font-bold ">{{ $user->name }}</h5>
                            <span class="block text-gray-400 font-semibold text-sm mt-1">Bergabung sejak
                                {{ $user->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-400 capitalize font-semibold mb-1">Total Spent</p>
                            <h6 class="text-lg font-bold">Rp. {{ number_format($total_price) }}</h6>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-400 capitalize font-semibold mb-1">Last Order</p>
                            <h6 class="text-lg font-bold">{{ $last_order }}</h6>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-400 capitalize font-semibold mb-1">Total Orders</p>
                            <h6 class="text-lg font-bold">{{ $total_orders }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full xl:w-1/3 p-5">
                <div class="bg-white p-5 shadow-lg shadow-gray-200/40 rounded-2xl">
                    <h5 class="text-2xl font-bold border-b border-dashed border-gray-300 mb-3 pb-3">Default Address</h5>
                    <div
                        class="flex items-center justify-between mt-4 flex-wrap border-b border-dashed border-gray-300 pb-6 mb-6">
                        <div class="w-full md:w-1/3">
                            <h6 class="font-bold text-lg">Address</h6>
                        </div>
                        <div class="w-full md:w-2/3">
                            <p class="text-sm text-gray-500 text-right">
                                {{ $user->alamat }}
                            </p>
                        </div>
                    </div>
                    <div class="flex flex-wrap items-center justify-between">
                        <div class="w-full md:w-1/3">
                            <h6 class="font-bold text-lg">Email</h6>
                        </div>
                        <div class="w-full md:w-2/3">
                            <p class="text-sm text-gray-500 text-right">
                                {{ $user->email }}
                            </p>
                        </div>
                    </div>
                    <div class="flex flex-wrap items-center justify-between mt-4">
                        <div class="w-full md:w-1/3">
                            <h6 class="font-bold text-lg">Phone</h6>
                        </div>
                        <div class="w-full md:w-2/3">
                            <p class="text-sm text-gray-500 text-right">
                                {{ $user->no_telepon }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <nav class="flex space-x-4" aria-label="Tabs" role="tablist">
                <button type="button"
                    class="hs-tab-active:font-semibold font-medium hs-tab-active:border-blue-500 hs-tab-active:text-blue-500 py-4 px-1 inline-flex items-center gap-2 border-b-[3px] border-transparent text-sm whitespace-nowrap text-gray-500 active"
                    id="tab-sales-item-1" data-hs-tab="#tabs-sales" aria-controls="tabs-sales" role="tab">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-[18px] h-[18px]">
                        <path
                            d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
                    </svg>
                    Orders <span class="text-gray-400">({{ $salesByUser->count() }})</span>
                </button>
                <button type="button"
                    class="hs-tab-active:font-semibold font-medium hs-tab-active:border-blue-500 hs-tab-active:text-blue-500 py-4 px-1 inline-flex items-center gap-2 border-b-[3px] border-transparent text-sm whitespace-nowrap text-gray-500"
                    id="tabs-reviews-item-2" data-hs-tab="#tabs-reviews" aria-controls="tabs-reviews" role="tab">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-[18px] h-[18px]">
                        <path fill-rule="evenodd"
                            d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                            clip-rule="evenodd" />
                    </svg>
                    Reviews <span class="text-gray-400">({{ $reviewByUser->count() }})</span>
                </button>
            </nav>
        </div>

        <div class="mt-5">
            <div id="tabs-sales" role="tabpanel" aria-labelledby="tab-sales-item-1">
                @empty($salesByUser->count())
                    <div class="text-center text-sm text-gray-400">User ini belum membeli apapun.</div>
                @else
                    <div class="w-full overflow-x-auto">
                        <div class="min-w-max">
                            <table class="table border-collapse table-auto">
                                <thead>
                                    <tr>
                                        <th>invoice</th>
                                        <th class="text-center">quantity</th>
                                        <th class="text-center">status</th>
                                        <th class="text-right">date</th>
                                        <th class="text-right">total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($salesByUser as $sales)
                                        <tr>
                                            <td>
                                                <a wire:navigate class="text-blue-500 font-semibold hover:underline"
                                                    href="{{ route('detail.order', strtolower($sales->invoice)) }}">#{{ $sales->invoice }}</a>
                                            </td>
                                            <td class="text-center">{{ $sales->quantity }}</td>
                                            <td class="text-center">
                                                <span
                                                    class="text-xs font-semibold rounded px-1
																						@if ($sales->status === 'menunggu_konfirmasi') bg-amber-400/60 border border-amber-500 text-amber-800
																						@elseif ($sales->status === 'dikemas') bg-amber-400/60 border border-amber-500 text-amber-800
																						@elseif ($sales->status === 'dikirim') bg-blue-400/60 border border-blue-500 text-blue-800
																						@elseif ($sales->status === 'selesai') bg-green-400/60 border border-green-500 text-green-800 @endif
																				">
                                                    {{ ucwords(str_replace('_', ' ', $sales->status)) }}
                                                </span>
                                            </td>
                                            <td class="text-right text-gray-400">{{ $sales->created_at->format('j M, Y') }}</td>
                                            <td class="text-right">Rp.
                                                {{ number_format($sales->total_price) }}</td>
                                        </tr </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endempty
            </div>
            <div id="tabs-reviews" class="hidden" role="tabpanel" aria-labelledby="tabs-reviews-item-2">
                @empty($reviewByUser->count())
                    <div class="text-center text-sm text-gray-400">User ini belum memberi ulasan apapun.</div>
                @else
                    <div class="w-full overflow-x-auto">
                        <div class="min-w-max">
                            <table class="table border-collapse table-auto">
                                <thead>
                                    <tr>
                                        <th>product</th>
                                        <th>rating</th>
                                        <th>review</th>
                                        <th class="text-right">date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reviewByUser as $review)
                                        <tr>
                                            <td class="max-w-[100px]">
                                                <a wire:navigate
                                                    href="{{ route('detail.product', $review->product->slug) }}"
                                                    class="text-blue-500 font-semibold hover:underline line-clamp-1"
                                                    href="">
                                                    {{ $review->product->judul }}
                                                </a>
                                            </td>
                                            <td class="flex items-center gap-px">
                                                @for ($i = 0; $i < $review->rating; $i++)
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="w-[18px] h-[18px] text-yellow-500">
                                                        <path fill-rule="evenodd"
                                                            d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                @endfor
                                            </td>
                                            <td class="max-w-[150px]">
                                                <p class="line-clamp-2">{{ $review->comment }}</p>
                                            </td>
                                            <td class="text-right text-gray-400">
                                                {{ $review->created_at->format('j M, Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endempty
            </div>
        </div>
    </div>
</x-app-layout>
