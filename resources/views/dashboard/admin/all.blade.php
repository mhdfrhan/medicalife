<x-app-layout>
    <x-slot name="title">{{ $title }}</x-slot>

    <section class="pb-14">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="heading !capitalize !font-extrabold">Semua Admin</h1>
            </div>
            <a href="{{ route('tambah.admin') }}" wire:navigate
                class="py-2.5 px-4 text-center bg-blue-green text-sm text-white rounded-lg font-semibold hover:opacity-80 duration-300">
                Add Admin</a>
        </div>
				@livewire('admins.all')
    </section>
</x-app-layout>
