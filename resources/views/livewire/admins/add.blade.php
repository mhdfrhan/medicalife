<div>
	<div class="mt-14 max-w-2xl">
		<div class="p-6 bg-white rounded-2xl">
				<form wire:submit='save'>
						<div class="mb-5 last:mb-0">
								<label for="name" class="label">Nama</label>
								<input type="text" class="input-form" wire:model.live='name'>
								@error('name')
										<span class="error-msg">{{ $message }}</span>
								@enderror
						</div>
						<div class="mb-5 last:mb-0">
								<label for="email" class="label">Email</label>
								<input type="email" class="input-form" wire:model.live='email'>
								@error('email')
										<span class="error-msg">{{ $message }}</span>
								@enderror
						</div>
						<div class="mb-5 last:mb-0">
								<label for="password" class="label">password</label>
								<input type="password" class="input-form" wire:model.live='password'>
								@error('password')
										<span class="error-msg">{{ $message }}</span>
								@enderror
						</div>
						<div class="mt-6">
							<button {{ $name === NULL || $email === NULL || $password === NULL ? 'disabled' : '' }} class="py-3 px-4 text-center text-white bg-blue-green rounded-lg w-full font-semibold duration-300 {{ $name === NULL || $email === NULL || $password === NULL ? 'cursor-not-allowed bg-opacity-60' : 'active:scale-95' }}">Tambah admin</button>
						</div>
				</form>
		</div>
</div>
</div>
