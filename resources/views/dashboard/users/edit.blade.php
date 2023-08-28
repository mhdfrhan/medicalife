<x-app-layout>
	<x-slot name="title">{{ $title }}</x-slot>

	<section class="pb-16">
		@livewire('users.edit', ['getId' => $getId])
	</section>
</x-app-layout>
