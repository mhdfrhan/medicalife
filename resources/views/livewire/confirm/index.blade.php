<div>
    @if (!Auth::user()->alamat || !Auth::user()->no_telepon)
        <div
            class="w-full py-2.5 text-center bg-red-500 rounded-xl text-white font-semibold mb-5 shadow-lg shadow-red-500/30">
            Silahkan lengkapi akun Anda terlebih dahulu. <a href="{{ route('user.dashboard') }}" wire:navigate
                class="underline">Klik disini</a>
        </div>
    @endif

    <div class="flex flex-wrap -mx-5">
        <div class="w-full lg:w-2/3 p-5">
            <div class="border-b pb-10 mb-10">
                <div class="max-w-md">
                    <h5 class="font-bold text-xl mb-6">Pengiriman</h5>
                    <h6 class="capitalize font-bold">Alamat pengiriman</h6>
                    <div class="mt-4">
                        <h6 class="font-semibold">{{ Auth::user()->name }}</h6>
                        <p class="text-sm to-gray-500 mt-1 2xl:text-base">
                            {{ !Auth::user()->alamat && !Auth::user()->no_telepon ? 'Anda belum menambahkan alamat dan nomor telepon' : Auth::user()->alamat . ' - ' . Auth::user()->no_telepon }}
                        </p>
                    </div>
                </div>
                <div class="mt-6">
                    <label for="pesan" class="label">Pesan</label>
                    <textarea cols="30" rows="6" wire:model='message' class="input-form" placeholder="If you have a message, write it here..."></textarea>
                </div>
            </div>
            <div>
                <h5 class="font-bold text-xl mb-6">List Pesanan</h5>
                <div class="border py-4 px-5 rounded-xl rounded-b-none">
                    <h6 class="capitalize font-bold">Dikirim oleh Medicalife</h6>
                </div>
                <div class="border py-4 px-5 border-t-0 rounded-xl rounded-t-none">
                    @if ($getProducts === null)
                        @foreach ($cart as $item)
                            <div class="flex flex-wrap -mx-5 mb-4 border-b pb-4 last:mb-0 last:border-0 last:pb-0">
                                <div class="w-full md:w-[60%] px-5">
                                    <div class="flex gap-4">
                                        <img src="{{ asset('img/products/' . $item->product->images->first()->image) }}"
                                            class="h-16 rounded-lg" alt="{{ $item->product->judul }}">
                                        <div>
                                            <h6 class="font-semibold capitalize">{{ $item->product->judul }}</h6>
                                            <p class="text-sm text-gray-500 my-1">{{ $item->quantity }}
                                                {{ $item->quantity > 1 ? 'items' : 'produk' }}</p>
                                            <p class="text-sm font-bold tracking-wide">Rp.
                                                {{ number_format($item->price) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full md:w-[40%] px-5">
                                    <h6 class="font-bold mb-1">Jasa pengiriman</h6>
                                    <p class="text-gray-500 text-sm">{{ $item->product->pengiriman }}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="flex flex-wrap -mx-5 mb-4 border-b pb-4 last:mb-0 last:border-0 last:pb-0">
                            <div class="w-full md:w-[60%] px-5">
                                <div class="flex gap-4">
                                    <img src="{{ asset('img/products/' . $getProduct->images->first()->image) }}"
                                        class="h-16 rounded-lg" alt="{{ $getProduct->judul }}">
                                    <div>
                                        <h6 class="font-semibold capitalize">{{ $getProduct->judul }}</h6>
                                        <p class="text-sm text-gray-500 my-1">{{ $getProduct->quantity }} produk</p>
                                        <p class="text-sm font-bold tracking-wide">Rp. {{ number_format($total) }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full md:w-[40%] px-5">
                                <h6 class="font-bold mb-1">Jasa pengiriman</h6>
                                <p class="text-gray-500 text-sm">{{ $getProduct->pengiriman }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/3 p-5">
            <div class="p-5 bg-blue-500 rounded-3xl shadow-lg shadow-blue-500/40">
                <h5 class="text-[22px] text-white font-bold">Ringkasan Belanja</h5>
                <div
                    class="mt-6 flex items-center justify-between text-white font-medium border-b mb-4 pb-4 border-gray-200/30 capitalize">
                    <p>Total harga ({{ $getProducts === null ? $cart->sum('quantity') : $getProduct->quantity }} produk)
                    </p>
                    <p>Rp. {{ $getProducts === null ? number_format($cart->sum('price')) : number_format($total) }}</p>
                </div>
                <div class="mt-4 flex items-center justify-between text-white font-medium capitalize">
                    <p>Total pembayaran</p>
                    <p class="font-bold">Rp.
                        {{ $getProducts === null ? number_format($cart->sum('price')) : number_format($total) }}</p>
                </div>
                <div class="mt-6">
                    <button {{ !Auth::user()->alamat || !Auth::user()->no_telepon ? 'disabled' : '' }}
                        class="w-full py-2.5 rounded-xl font-bold duration-300 items-center inline-flex justify-center gap-4  {{ !Auth::user()->alamat || !Auth::user()->no_telepon ? 'cursor-not-allowed bg-gray-200/80' : 'bg-white  active:scale-95 cursor-pointer' }}"
                        wire:click='confirm'>
                        <span wire:loading wire:target='confirm'
                            class="animate-spin inline-block w-4 h-4 border-[2px] border-current border-t-transparent text-gray-800 rounded-full"
                            role="status" aria-label="loading">
                            <span class="sr-only">Loading...</span>
                        </span>
                        Konfirmasi Pesanan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
