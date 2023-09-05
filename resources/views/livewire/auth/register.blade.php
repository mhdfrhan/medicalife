<div>
	@include('partials.message')
    <h5 class="font-bold text-2xl text-center text-gray-700">Sign up with new account</h5>
    <p class="mt-2 text-gray-500 text-center font-semibold mb-10">Don't have an account yet? create now</p>

    <div class="">
        <form wire:submit='register'>
            <div class="mb-5">
                <label for="name" class="label">Your Name</label>
                <input type="text" id="name" wire:model.live='name' class="input-form" autocomplete="off" autofocus>
                @error('name')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5">
                <label for="email" class="label">Email</label>
                <input type="email" id="email" wire:model.live='email' class="input-form" autocomplete="off">
                @error('email')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5">
                <label for="password" class="label">Password</label>
                <input type="password" id="password" wire:model.live='password' class="input-form">
                @error('password')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="password_confirmation" class="label">Confirm Password</label>
                <input type="password" id="password_confirmation" wire:model.live='password_confirmation' class="input-form">
                @error('password_confirmation')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-6">
                <button {{ $email === null || $password === null ? 'disabled' : '' }}
                    class="w-full py-3 px-4 text-center text-white bg-blue-500 rounded-xl font-bold duration-300 {{ $email === null || $password === null ? 'bg-opacity-60 cursor-not-allowed' : 'active:scale-95' }}">Sign
                    Up</button>
            </div>
            <div class="mt-4 text-sm text-gray-500 text-center">
							Already have an acoount? <a href="{{ route('login') }}" wire:navigate
                    class="text-blue-500 font-bold hover:underline">Sign In</a>
            </div>
        </form>
    </div>
</div>
