<x-app-layout>
	<x-slot name="title">{{ $title }}</x-slot>

	<h1 class="heading !capitalize !font-bold">Semua Pesan</h1>
	<section class="pb-14">
		@livewire('contact.dashboard')
	</section>
</x-app-layout>