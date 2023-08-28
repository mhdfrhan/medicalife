<x-main-layout>
    <x-slot name="title">{{ $title }}</x-slot>

    <section class="pt-14 px-5">
        <div class="max-w-6xl mx-auto">
            @livewire('profile.user-security')
        </div>
    </section>
</x-main-layout>
