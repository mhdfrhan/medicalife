<x-app-layout>
	<x-slot name="title">{{ $title }}</x-slot>

	<section class="pb-14">
		@livewire('users.all')
	</section>
</x-app-layout>