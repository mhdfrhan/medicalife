<x-guest-layout>
	@include('partials.message')
    <div class="mb-4 text-sm text-gray-500">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="label">Email</label>
            <input type="email" name="email" class="input-form" required autofocus :value="old('email', $request->email)	>
            @error('email')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <button class="w-full py-3 px-4 text-center text-white bg-blue-green rounded-xl font-bold duration-300 active:scale-95">
                {{ __('Email Password Reset Link') }}
            </button>
        </div>
    </form>
</x-guest-layout>
