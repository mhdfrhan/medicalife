<div>
    <div>
        <h1 class="heading !capitalize !font-extrabold">Edit User</h1>
        <p class="text-gray-500 mt-2">Silahkan edit user dibawah ini.</p>
    </div>
    <div class="mt-14 max-w-2xl">
        <div class="p-6 bg-white rounded-2xl">
            <form wire:submit='update'>
                <div class="mb-5">
                    <div class=" flex items-start gap-4">
                        @if ($image)
                            <img src="{{ $image->temporaryUrl() }}" class="w-20 h-20 object-cover rounded-full">
                        @else
                            @if ($user->image)
                                <img src="{{ asset('img/profile/' . $user->image) }}"
                                    class="w-20 h-20 object-cover rounded-full" alt="{{ $user->name }}">
                            @else
                                <div class="w-20 h-20 rounded-full flex items-center justify-center bg-gray-200">
																	<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
																		<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
																	</svg>																	
                                </div>
                            @endif
                        @endif
                        <div class="mt-2 flex flex-wrap items-center gap-4">
                            <div>
                                <label for="image"
                                    class="text-blue-500 hover:underline font-semibold cursor-pointer">Pilih
                                    gambar</label>
                                <input type="file" class="hidden" id="image" wire:model='image'>
                            </div>
                            @if ($user->image)
                                <div class="text-red-500 hover:underline font-semibold cursor-pointer"
                                    wire:click='hapusGambar'>Hapus gambar</div>
                            @endif
                        </div>
                    </div>
                    @error('image')
                        <span class="error-msg mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="name" class="label">Nama</label>
                    <input type="text" class="input-form" wire:model.live='name'>
                    @error('name')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="label">Email</label>
                    <input type="email" class="input-form" wire:model.live='email'>
                    @error('email')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="label">password baru</label>
                    <input type="password" class="input-form" wire:model.live='password'>
                    @error('password')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password" class="label">password baru</label>
                    <select wire:model='status' class="input-form">
                        <option value="customer">Customer</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="mt-6">
                    <button {{ $name === null || $email === null ? 'disabled' : '' }}
                        class="py-3 px-4 text-center text-white bg-blue-500 rounded-lg w-full font-semibold duration-300 {{ $name === null || $email === null ? 'cursor-not-allowed bg-opacity-60' : 'active:scale-95' }}">Update
                        user</button>
                </div>
            </form>
        </div>
    </div>
</div>
