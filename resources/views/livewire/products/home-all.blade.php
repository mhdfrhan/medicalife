<div>
    @include('partials.message')
    <div class="mb-4 text-right">
        <select class="input-form !w-52" wire:model.live='sort'>
            <option value="terbaru">Terbaru</option>
            <option value="terlama">Terlama</option>
            <option value="terlaris">Terlaris</option>
        </select>
    </div>
    @empty($products->count())
        <div class="text-center text-sm text-neutral-500">Belum ada produk saat ini.</div>
    @endempty
    <div class="flex flex-wrap -mx-4">
        @foreach ($products as $i => $product)
            <div class="w-full sm:w-1/2 md:w-1/3 p-4">
                <div class="bg-white rounded-3xl p-5 group">
                    <div class="relative overflow-hidden rounded-xl">
                        <a href="{{ route('detail.product', $product->slug) }}" wire:navigate>
                            <img src="{{ asset('img/products/' . $product->images->first()->image) }}"
                                class="rounded-xl mx-auto bg-gray-200" alt="{{ $product->judul }}">
                        </a>
                        <button
                            class="w-10 h-10 flex items-center justify-center rounded-xl bg-blue-500 text-white absolute top-2 -right-20 group-hover:right-2 duration-500 transition-all ease-in-out hover:bg-white hover:text-blue-500 shadow-lg shadow-blue-500/20"
                            wire:click='addToCart({{ $product->id }})'>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-4 text-center px-4">
                        <a href="{{ route('detail.product', $product->slug) }}" wire:navigate
                            class="hover:opacity-90 capitalize font-bold text-lg inline-block">
                            <h5 class=" line-clamp-2">
                                {{ $product->judul }}
                            </h5>
                        </a>
                        <span class="block mt-1 text-blue-500 font-bold">Rp.
                            {{ number_format($product->harga_diskon) }}
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $products->links() }}
    </div>
</div>
