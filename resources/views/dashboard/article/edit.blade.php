<x-app-layout>
    <x-slot name="title">{{ $title }}</x-slot>

    <section class="pb-14">
        @livewire('article.edit', ['getSlug' => $slug])
    </section>
</x-app-layout>
