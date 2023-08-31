<div>
	@include('partials.message')
    <form wire:submit='send'>
        <div class="mb-4">
            <input type="text" wire:model.blur='name' class="formInput" autocomplete="off" placeholder="Your name">
            @error('name')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <input type="email" wire:model.blur='email' class="formInput" autocomplete="off" placeholder="Email">
            @error('email')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <input type="text" wire:model.blur='subject' class="formInput" autocomplete="off" placeholder="Subject">
            @error('subject')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <textarea cols="30" wire:model.blur='message' rows="7" class="formInput" placeholder="Message..."></textarea>
            @error('message')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>
        <div class="mt-6">
            <button type="submit"
                class="py-5 px-4 text-center text-sm bg-blue-green rounded-xl text-white w-full font-semibold hover:bg-white hover:text-blue-green duration-300">Send
                Message</button>
        </div>
    </form>
</div>
