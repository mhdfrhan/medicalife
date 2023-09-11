<div>
    @include('partials.message')
    <a href="{{ route('all.products') }}" wire:navigate
        class="w-14 h-14 flex items-center justify-center rounded-full bg-blue-500 shadow-lg shadow-blue-500/30 text-white mb-8">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
        </svg>
    </a>
    <div class="flex flex-wrap -mx-5">
        <div class="w-full md:w-[40%] p-5" wire:ignore>
            <div>
                <img id="zoom" src="{{ asset('img/products/' . $detail->images->first()->image) }}"
                    class="cursor-pointer w-full rounded-xl" alt="Gambar Utama">
            </div>
            <div class="mt-4">
                <div class="swiper gallery">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div>
                                <img src="{{ asset('img/products/' . $detail->images->first()->image) }}"
                                    class="rounded-xl gallery-image active" alt="">
                            </div>
                        </div>
                        @foreach ($detail->images as $i => $image)
                            @if ($i > 0)
                                <div class="swiper-slide">
                                    <div>
                                        <img src="{{ asset('img/products/' . $image->image) }}"
                                            class="rounded-xl gallery-image" alt="Gambar {{ $i + 1 }}">
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full md:w-[60%] p-5">
            <div class="p-5 lg:p-8 bg-white rounded-2xl">
                <h1 class="text-2xl font-bold">{{ $detail->judul }}</h1>
                @if ($averageRating)
                    <div class="flex items-center gap-2 mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-5 h-5 text-yellow-500">
                            <path fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="font-semibold text-gray-500">
                            {{ number_format($averageRating) }}
                            out of 5 ({{ $reviews->count() }})
                        </span>
                    </div>
                @endif
                <div class="flex items-center gap-3 justify-end text-sm my-4">
                    <span>Availablity</span>
                    <div class="py-1 px-4 bg-blue-500 text-white rounded-full">
                        {{ $detail->stok > 0 ? 'In Stock' : 'Out of stock' }}
                    </div>
                </div>
                <h6 class="text-blue-500 font-bold text-3xl">
                    Rp. {{ number_format($detail->harga_diskon) }}
                    <span class="text-sm text-gray-400 font-medium line-through">
                        Rp. {{ number_format($detail->harga_asli) }}
                    </span>
                    <span class="text-xs py-0.5 px-1.5 bg-rose-500 text-white rounded-full ml-2">
                        {{ number_format((($detail->harga_asli - $detail->harga_diskon) / $detail->harga_asli) * 100) }}%
                    </span>
                </h6>

                <div class="my-7 bg-neutral-800 p-5 rounded-xl text-white">
                    <h4 class="mb-3 text-lg font-semibold">Detail Produk</h4>
                    <div class="text-sm line-clamp-3" id="detailProduct">
                        {!! $detail->detail !!}
                    </div>
                    @if (str_word_count(strip_tags($detail->detail)) > 100)
                        <button class="mt-2 text-[#31C3C9] font-bold text-sm" id="showMore">Lihat Selengkapnya</button>
                        <button class="mt-2 text-[#31C3C9] font-bold text-sm hidden" id="showLess">Tutup
                            Selengkapnya</button>
                    @endif
                </div>

                <div class="flex items-center gap-x-5">
                    <h5>Jumlah:</h5>

                    <div class="flex items-center gap-x-3">
                        <div class="flex items-stretch">
                            <button wire:click='decrement'
                                class="w-9 h-9 flex items-center text-gray-500 justify-center border rounded-l-lg border-r-0 border-gray-300 hover:bg-blue-500 duration-300 hover:text-white hover:border-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 ">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                </svg>
                            </button>
                            <input type="number" id="quantity" wire:model='quantity'
                                class="w-12 h-9 border border-gray-300 focus:outline-none text-center text-sm"
                                min="1">
                            <button wire:click='increment'
                                class="w-9 h-9 flex items-center text-gray-500 justify-center border border-l-0 rounded-r-lg border-gray-300 hover:bg-blue-500 duration-300 hover:text-white hover:border-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>
                            </button>
                        </div>
                        <span class="text-xs font-medium sm:text-sm text-gray-500">Tersisa {{ $detail->stok }}
                            produk</span>
                    </div>
                </div>
                <div class="mt-14 sm:flex items-center justify-end gap-x-4">
                    <button wire:click='addToCart({{ $detail->id }})'
                        class="flex w-full justify-center sm:w-auto mb-3 sm:mb-0 items-center gap-x-3 border py-3 px-6 border-blue-500  text-blue-500 rounded-lg hover:bg-blue-500/10 duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>
                        <span>Masukkan ke keranjang</span>
                    </button>
                    <button wire:click='buyNow({{ $detail->id }})'
                        class="border w-full sm:w-auto py-3 px-6 border-blue-500 bg-blue-500 text-white rounded-lg hover:opacity-80 duration-300">
                        <span>Beli Sekarang</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
