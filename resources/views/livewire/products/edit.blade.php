@push('script')
    <script data-navigate-track="reload">
        ClassicEditor
            .create(document.querySelector('#detail'), {
                mediaEmbed: {
                    previewsInData: true
                },
            })
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    @this.set('detail', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#deskripsi'), {
                mediaEmbed: {
                    previewsInData: true
                },
            })
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    @this.set('deskripsi', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush

<div>
    <div class="flex items-center justify-between">
        <div>
            <h1 class="heading !capitalize !font-extrabold">Edit Produk</h1>
            <p class="text-gray-500 mt-2">Silahkan edit produk Anda dibawah ini.</p>
        </div>
        <div class="mt-8 flex items-center gap-3">
            <button wire:click='draft'
                class="py-2.5 px-4 text-center border-gray-300 hover:bg-gray-200 hover:border-gray-200 border text-sm text-blue-green rounded-lg font-semibold duration-300">Update
                ke Draft</button>
            <button wire:click='update'
                class="py-2.5 px-4 text-center bg-blue-green text-sm text-white rounded-lg font-semibold hover:opacity-80 duration-300">Publish
                Product</button>
        </div>
    </div>
    <div class="mt-14 flex flex-wrap -mx-5">
        <div class="w-full lg:w-[60%] px-5">
            <div class="mb-6">
                <h6 class="label">Gambar produk</h6>
                <div class="flex flex-wrap items-center gap-4">
                    @foreach ($image as $i => $img)
                        <div class="relative">
                            <img src="{{ asset('img/products/' . $img->image) }}"
                                class="w-24 h-24 object-cover rounded-lg">
                            <div class="absolute -top-2 -right-2 w-6 h-6 flex items-center justify-center rounded-full bg-gray-300 hover:bg-blue-green group shadow-lg cursor-pointer duration-300"
                                wire:click="deleteOldImage({{ $img->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="w-4 h-4 text-gray-800 group-hover:text-white duration-300">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                        </div>
                    @endforeach
                    @for ($i = 0; $i < $displayedImages; $i++)
                        @if ($images[$i] ?? false)
                            <div class="relative">
                                <img src="{{ $images[$i]->temporaryUrl() }}" class="w-24 h-24 object-cover rounded-lg">
                                <div class="absolute -top-2 -right-2 w-6 h-6 flex items-center justify-center rounded-full bg-gray-300 hover:bg-blue-green group shadow-lg cursor-pointer duration-300"
                                    wire:click="deleteImage({{ $i }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-4 h-4 text-gray-800 group-hover:text-white duration-300">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>
                            </div>
                        @else
                            @if ($displayedImages <= (10 - $totalImages))
                                <div class="relative">
                                    <label for="image-{{ $i + 1 }}"
                                        class="w-24 h-24 flex items-center justify-center border-2 rounded-lg text-blue-green border-dashed text-center p-1 "
                                        wire:loading.class='opacity-60' wire:target='images'>
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                            </svg>
                                            <span class="inline-block text-xs font-semibold mt-px">Tambahkan Foto
                                                ({{ $totalImages + $displayedImages - 1 }}/9)</span>
                                        </div>
                                    </label>
                                    <input type="file" id="image-{{ $i + 1 }}" wire:model.live="images"
                                        class="hidden" accept=".jpg, .png, .jpeg">
                                    <div class=" absolute top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2"
                                        wire:loading wire:target='images'>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4 animate-spin">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                        </svg>
                                    </div>
                                    @error("images.$i")
                                        <span class="error-msg">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif
                        @endif
                    @endfor
                </div>
            </div>
            <div class="mb-6">
                <label for="judul" class="label">Nama produk</label>
                <input type="text" id="judul" wire:model.live='judul' class="input-form"
                    placeholder="Ketik judul disini...">
                @error('judul')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="slug" class="label">Slug</label>
                <input type="text" id="slug" wire:model.live='slug' class="input-form">
                @error('slug')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="detail" class="label">Detail produk</label>
                <div wire:ignore>
                    <textarea id="detail">{{ $contentDetail }}</textarea>
                </div>
                @error('detail')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="deskripsi" class="label">Deskripsi produk</label>
                <div wire:ignore>
                    <textarea id="deskripsi">{{ $contentDeskripsi }}</textarea>
                </div>
                @error('deskripsi')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="w-full lg:w-[40%] px-5">
            <div class="p-5 bg-white rounded-xl shadow-lg shadow-gray-200/20">
                @error('diskon')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
                <div class="flex flex-wrap -mx-2 mb-6 gap-4 sm:gap-0">
                    <div class="w-full sm:w-1/2 px-2">
                        <label for="harga_awal" class="label">Harga Awal</label>
                        <input type="number" wire:model.blur='harga_awal' id="harga_awal" class="input-form"
                            placeholder="Rp.">
                        @error('harga_awal')
                            <span class="error-msg">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full sm:w-1/2 px-2">
                        <label for="harga_diskon" class="label">Harga Diskon</label>
                        <input type="number" wire:model.live='harga_diskon' id="harga_diskon" class="input-form"
                            placeholder="Rp.">
                        @error('harga_diskon')
                            <span class="error-msg">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2 mb-2 gap-4 sm:gap-0">
                    <div class="w-full sm:w-1/2 px-2">
                        <label for="stok" class="label">Stok</label>
                        <input type="number" wire:model.blur='stok' id="stok" class="input-form"
                            placeholder="Quantity">
                        @error('stok')
                            <span class="error-msg">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full sm:w-1/2 px-2">
                        <label for="pengiriman" class="label">pengiriman</label>
                        <select id="pengiriman" wire:model.blur='pengiriman' class="input-form">
                            <option selected>Pilih Pengiriman</option>
                            <option value="1">Cash On Delivery</option>
                        </select>
                        @error('pengiriman')
                            <span class="error-msg">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <small class="text-gray-500">Pengiriman saat ini hanya tersedia untuk COD</small>
            </div>
        </div>
    </div>
</div>
