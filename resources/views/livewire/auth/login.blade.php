<div>
	@include('partials.message')
    <h5 class="font-bold text-2xl text-center text-gray-700">Log in to your account</h5>
    <p class="mt-2 text-gray-500 text-center font-semibold mb-10">Welcome back! Please enter your details.</p>

    <div class="">
        <form wire:submit='login'>
            <div class="mb-5">
                <label for="email" class="label">Email</label>
                <input type="email" id="email" wire:model.live='email' class="input-form" autocomplete="off" autofocus>
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
            <div class="flex items-center justify-between gap-3">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" wire:model='remember'
                        class="rounded border-gray-300 text-blue-green shadow-sm focus:ring-blue-green duration-300"
                        name="remember">
                    <span class="ml-2 text-gray-600 select-none">Remember me</span>
                </label>
                <div>
                    <a class="text-red-600 hover:underline" href="{{ route('password.request') }}" wire:navigate>
                        {{ __('Lupa password?') }}
                    </a>
                </div>
            </div>
            <div class="mt-6">
                <button {{ $email === null || $password === null ? 'disabled' : '' }}
                    class="w-full py-3 px-4 text-center text-white bg-blue-green rounded-xl font-bold duration-300 {{ $email === null || $password === null ? 'bg-opacity-60 cursor-not-allowed' : 'active:scale-95' }}">Sign
                    In</button>
            </div>
            <div class="mt-4 text-sm text-gray-500 text-center">
                Don’t have an account? <a href="{{ route('register') }}" wire:navigate
                    class="text-blue-green font-bold hover:underline">Sign Up</a>
            </div>
        </form>
    </div>
</div>
