<div>
    @include('partials.message')
    <div class="flex flex-wrap -mx-5">
        @livewire('profile.menu')
        <div class="w-full lg:w-[70%] p-5">
            <h5 class="label !text-xl">Akun Saya</h5>
            <div class="p-5 bg-white rounded-2xl">
                @if (!Auth::user()->alamat && !Auth::user()->no_telepon)
                    <div
                        class="w-full py-2.5 text-center bg-red-500 rounded-xl text-white font-semibold mb-5 shadow-lg shadow-red-500/30 px-4">
                        Silahkan lengkapi akun Anda terlebih dahulu.
                    </div>
                @endif
                <div>
                    <form wire:submit='updateData'>
                        <div class="mb-6 last-of-type:mb-0">
                            <div class="flex items-center gap-4 mb-2">
                                <label for="image" class="label !m-0">Gambar</label>
                                @if (Auth::user()->image)
                                    <button type="button" class="text-sm text-red-600 hover:underline font-medium"
                                        wire:click='hapusGambar'>Hapus gambar</button>
                                @endif
                            </div>
                            <input type="file" id="image" class="input-form" wire:model.blur='image'
                                autocomplete="off">
                            <small>Foto harus maksimal 2mb dan harus Square Portrait</small>
                            @error('image')
                                <span class="error-msg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-6 last-of-type:mb-0">
                            <label for="name" class="label">Nama Lengkap</label>
                            <input type="text" id="name" class="input-form" wire:model.blur='name'
                                autocomplete="off">
                            @error('name')
                                <span class="error-msg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-6 last-of-type:mb-0">
                            <label for="email" class="label">email</label>
                            <input type="email" id="email" class="input-form" wire:model.blur='email'
                                autocomplete="off">
                            @error('email')
                                <span class="error-msg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-6 last-of-type:mb-0">
                            <label for="phone" class="label">Nomor HP</label>
                            <input type="number" id="phone" class="input-form" wire:model.blur='phone'
                                autocomplete="off"">
                            @error('phone')
                                <span class="error-msg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-6 last-of-type:mb-0">
                            <label for="address" class="label">Alamat</label>
                            <textarea id="address" cols="30" rows="6" class="input-form" wire:model.blur='address'></textarea>
                            <small>Lengkap dengan nama provinsi, kota/kabupaten, kelurahan, kecamatan</small>
                            @error('address')
                                <span class="error-msg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-8">
                            <button
                                class="py-3 px-4 text-center font-bold bg-blue-500 rounded-xl w-full text-white active:scale-95 duration-300">Perbarui
                                Akun Saya</button>
                            <small class="mt-3 text-gray-500 text-center block">Kami sangat menjaga privasi dan keamanan
                                data Anda. Keamanan data Anda adalah prioritas utama bagi kami.</small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
