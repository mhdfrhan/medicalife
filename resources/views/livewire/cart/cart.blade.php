<div class="flex flex-wrap -mx-5">
	@include('partials.message')
    <div class="w-full md:w-2/3 lg:w-2/3 p-5">
        <div class="p-5 bg-white rounded-3xl shadow-lg shadow-gray-200/40">
					@empty($carts->count())
							<div class="text-sm text-center text-gray-500">Tidak ada produk di keranjang belanja.</div>
					@endempty
            @foreach ($carts as $i => $cart)
                <div class="flex flex-wrap -mx-4 mb-6 last-of-type:mb-0">
                    <div class="w-full md:w-1/2 lg:w-1/4 p-4">
                        <img src="{{ asset('img/products/' . $cart->product->images->first()->image) }}"
                            class="rounded-xl" alt="{{ $cart->product->judul }}">
                    </div>
                    <div class="w-full md:w-1/2 lg:w-2/4 p-4">
                        <div>
                            <h5 class="text-xl font-semibold capitalize line-clamp-2">{{ $cart->product->judul }}</h5>
                            <p class="text-sm text-gray-500 my-1 font-medium">Stock: {{ $cart->product->stok }}</p>
                            <h5 class="text-xl text-blue-500 font-bold">Rp.
                                {{ number_format($cart->product->harga_diskon) }} <span class="text-sm font-medium text-gray-400 line-through">{{ number_format($cart->product->harga_asli) }}</span></h5>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/4 p-4">
                        <div class="flex items-center justify-end gap-x-2">
                            <button class="w-10 h-10 flex items-center justify-center border rounded-xl border-gray-300 hover:bg-rose-500 hover:text-white duration-300 hover:border-rose-500" wire:click='minusQuantity({{ $cart->id }})'>
															<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
																<path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
															</svg>																													
														</button>
                            <input type="number" class="w-14 h-10 border-gray-300 rounded-xl text-center focus:border-blue-500 focus:ring-blue-500" value="{{ $cart->quantity }}">
                            <button class="w-10 h-10 flex items-center justify-center border rounded-xl border-gray-300 hover:bg-blue-500 hover:text-white duration-300 hover:border-blue-500" wire:click='plusQuantity({{ $cart->id }})'>
															<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
																<path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
															</svg>															
														</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="w-full md:w-1/3 lg:w-1/3 p-5">
        <div class="p-5 bg-blue-500 rounded-3xl shadow-lg shadow-blue-500/40">
					<h5 class="text-[22px] text-white font-bold">Ringkasan Belanja</h5>
					<div class="mt-6 flex items-center text-lg justify-between text-white font-medium">
						<p>Total harga</p>
						<p class="font-bold">Rp. {{ number_format($totalHarga) }}</p>
					</div>
					<div class="mt-6">
						<button {{ !$carts->count() ? 'disabled' : '' }} class="w-full py-2.5 rounded-xl font-bold duration-300 items-center inline-flex justify-center gap-4  {{ !$carts->count() ? 'cursor-not-allowed bg-gray-200/80' : 'bg-white  active:scale-95 cursor-pointer' }}" wire:click='confirm'>
							<span wire:loading wire:target='confirm' class="animate-spin inline-block w-4 h-4 border-[2px] border-current border-t-transparent text-gray-800 rounded-full" role="status" aria-label="loading">
								<span class="sr-only">Loading...</span>
							</span>
							Pembayaran
						</button>
					</div>
        </div>
    </div>
</div>
