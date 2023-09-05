<div>
    @include('partials.message')
    <div class="flex flex-wrap -mx-5">
        @livewire('profile.menu')
        <div class="w-full lg:w-[70%] p-5">
            <h5 class="label !text-xl">Keamanan</h5>
            <div class="p-5 bg-white rounded-2xl">
                <div class="max-w-md">
                    <h6 class="label !mb-8">Ubah Password</h6>
                    <div>
                        <form wire:submit='save'>
                            <div class="mb-5">
                                <label for="oldPassword" class="font-bold block mb-1 text-sm">Password Anda</label>
                                <input type="password" wire:model.blur='oldPassword' id="oldPassword"
                                    class="input-form">
                                @error('oldPassword')
                                    <span class="error-msg">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label for="password" class="font-bold block mb-1 text-sm">Password Baru</label>
                                <input type="password" wire:model.live='password' id="password"
                                    class="input-form">
                                @error('password')
                                    <span class="error-msg">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label for="password_confirmation" class="font-bold block mb-1 text-sm">Konfirmasi
                                    Password</label>
                                <input type="password" wire:model.live='password_confirmation'
                                    id="password_confirmation" class="input-form">
                                @error('password_confirmation')
                                    <span class="error-msg">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-6">
                                <button
                                    {{ $oldPassword === null || $password === null || $password_confirmation === null ? 'disabled' : '' }}
                                    class="w-full bg-blue-500 {{ $oldPassword === null || $password === null || $password_confirmation === null ? 'cursor-not-allowed bg-opacity-60' : 'active:scale-95' }} duration-300 py-2.5 px-4 text-center rounded-lg text-white text-sm font-semibold">
                                    Ubah Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
