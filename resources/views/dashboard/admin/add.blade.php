<x-app-layout>
    <x-slot name="title">{{ $title }}</x-slot>

    <section class="pb-14">
        <div>
            <h1 class="heading !capitalize !font-extrabold">Tambah Admin</h1>
            <p class="text-gray-500 mt-2">Silahkan tambahkan admin dibawah ini.</p>
        </div>
				@livewire('admins.add')
    </section>
</x-app-layout>
