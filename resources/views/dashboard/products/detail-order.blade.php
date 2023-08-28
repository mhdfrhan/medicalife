<x-app-layout>
    <x-slot name="title">{{ $title }}</x-slot>

    <section class="pb-14">
			@livewire('products.detail-order', ['invoice' => $invoice])
    </section>
</x-app-layout>
