<div>
    @include('partials.message')
    <ul class="flex items-center gap-x-6 mt-6">
        <li class="text-sm text-gray-500 font-bold">
            <span class="text-blue-500">All</span> ({{ $messages->count() }})
        </li>
        <li class="text-sm text-gray-500 font-bold">
            <span class="text-blue-500">Read</span> ({{ $read->count() }})
        </li>
        <li class="text-sm text-gray-500 font-bold">
            <span class="text-blue-500">Unread</span> ({{ $unread->count() }})
        </li>
    </ul>
    <div class="mt-14">
        <div class="p-6 lg:p-8 bg-white rounded-3xl shadow-lg shadow-gray-200/40">
            <div class="flex items-center justify-between">
                @if (count($messages) > 0)
                    <div class="flex items-center gap-x-4">
                        <div class="{{ count($filterDelete) > 0 ? 'border-r pr-4 border-neutral-300' : '' }} flex items-center gap-x-1"
                            wire:click='filterDeleteAll'>
                            <input type="checkbox" id="selectAll" wire:model="selectAll"
                                class="rounded text-blue-500 focus:outline-blue-500 duration-300 focus:ring-blue-500">
                            <label for="selectAll" class="ml-2 select-none text-neutral-400">Pilih Semua</label>
                        </div>

                        @if (count($filterDelete) > 0)
                            <div data-hs-overlay="#deleteAll-modal"
                                class="w-8 h-8 hover:bg-neutral-400/30 duration-300 text-gray-600 flex items-center justify-center rounded-full cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </div>
                        @endif
                    </div>
                @endif
                <div class="mb-6 max-w-[10rem] ml-auto">
                    <select class="input-form !mr-5" wire:model.live="sortOption">
                        <option value="newest">Terbaru</option>
                        <option value="oldest">Terlama</option>
                        <option value="unread">Belum Dibaca</option>
                        <option value="read">Sudah Dibaca</option>
                    </select>
                </div>
            </div>
            @empty($messages->count())
                <div class="text-sm text-center text-gray-400">Belum ada pesan masuk.</div>
            @else
                @foreach ($messages as $i => $message)
                    <div class="relative group">
                        <div class="absolute top-[17px] lg:top-1/2 lg:-translate-y-1/2 left-0 pl-3 z-10">
                            <input type="checkbox" wire:model='filterDelete' value="{{ $message->id }}"
                                class="rounded text-blue-500 focus:outline-blue-500 duration-300 focus:ring-blue-500">
                        </div>
                        <div wire:click='read({{ $message->id }})' data-hs-overlay="#read-modal-{{ $i + 1 }}"
                            class="relative flex flex-wrap items-center justify-between -mx-4 mb-4 last-of-type:mb-0 border border-neutral-200 rounded-xl group cursor-pointer {{ $message->status == 0 || in_array($message->id, $filterDelete) ? 'bg-neutral-200' : 'bg-transparent' }} {{ in_array($message->id, $filterDelete) ? 'bg-neutral-200' : '' }}">
                            <div class="w-full lg:w-1/4 p-4">
                                <div class="flex items-center justify-between">
                                    <div class="overflow-hidden pl-10 mr-4">
                                        <p class="font-bold truncate">{{ $message->name }}</p>
                                    </div>
                                    @if ($message->status == 0)
                                        <div class="bg-red-500 py-0.5 px-2 rounded-full text-xs text-white shrink-0">
                                            Belum dibaca
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="w-full lg:w-2/4 p-4">
                                <div>
                                    <p class="truncate font-semibold">{{ $message->subject }} <span
                                            class="text-neutral-500">-
                                            {{ $message->message }}</span></p>
                                </div>
                            </div>
                            <div class="w-full lg:w-1/4 p-4 relative">
                                <div class="text-right group-hover:lg:hidden text-gray-400 text-sm">
                                    {{ $message->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                        <div
                            class="hidden group-hover:lg:flex justify-end items-center gap-x-2 absolute top-1/2 -translate-y-1/2 right-0 pr-2 z-10">
                            @if ($message->status == 0)
                                <div class="hover:bg-neutral-400/30 w-8 h-8 rounded-full flex items-center justify-center duration-300 cursor-pointer select-none"
                                    title="Tandai sudah dibaca" wire:click='read({{ $message->id }})'>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21.75 9v.906a2.25 2.25 0 01-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 001.183 1.981l6.478 3.488m8.839 2.51l-4.66-2.51m0 0l-1.023-.55a2.25 2.25 0 00-2.134 0l-1.022.55m0 0l-4.661 2.51m16.5 1.615a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.844a2.25 2.25 0 011.183-1.98l7.5-4.04a2.25 2.25 0 012.134 0l7.5 4.04a2.25 2.25 0 011.183 1.98V19.5z" />
                                    </svg>
                                </div>
                            @elseif ($message->status == 1)
                                <div class="hover:bg-neutral-400/30 w-8 h-8 rounded-full flex items-center justify-center duration-300 cursor-pointer select-none"
                                    title="Tandai belum dibaca" wire:click='unread({{ $message->id }})'>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                    </svg>
                                </div>
                            @endif
                            <div class="hover:bg-neutral-400/30 w-8 h-8 rounded-full flex items-center justify-center duration-300 cursor-pointer"
                                data-hs-overlay="#delete-modal-{{ $i + 1 }}" title="Hapus pesan">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- modal read --}}
                    <div id="read-modal-{{ $i + 1 }}"
                        class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[260] overflow-x-hidden overflow-y-auto"
                        wire:ignore>
                        <div
                            class="hs-overlay-open:opacity-100 hs-overlay-open:scale-100 hs-overlay-open:duration-300 opacity-0 scale-95 transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                            <div class="flex flex-col bg-white border shadow-sm rounded-xl w-full">
                                <div class="flex justify-end py-6 pb-0 px-6">

                                    <button type="button"
                                        class="hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-full text-gray-500 hover:bg-gray-300/40 duration-300 focus:outline-0 text-sm"
                                        data-hs-overlay="#read-modal-{{ $i + 1 }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            class="w-5 h-5">
                                            <path
                                                d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="p-6 pt-4 overflow-y-auto ">
                                    <div class="flex justify-between gap-4">
                                        <div>
                                            <h5 class="font-bold text-2xl">Dari <span
                                                    class="text-blue-500">{{ $message->name }}</span></h5>
                                            <p class="text-gray-400 text-sm">{{ $message->email }}</p>
                                        </div>
                                        <div class="text-gray-400 text-sm mt-1">
                                            {{ $message->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                    <div class="mt-6 bg-gray-200 rounded-2xl p-5">
                                        <div>
                                            <h6 class="text-xl font-bold">{{ $message->subject }}</h6>
                                            <p class="mt-4 text-gray-500">{{ $message->message }}</p>
                                        </div>
                                    </div>
                                    <div class="mt-8 text-right">
                                        <a href="mailto:{{ $message->email }}" target="_blank"
                                            class="py-3 px-6 bg-blue-500 text-sm
																				 text-white rounded-xl font-semibold inline-block active:scale-95 duration-300">Balas
                                            pesan ini</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- delete modal --}}
                    <div id="delete-modal-{{ $i + 1 }}"
                        class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[260] overflow-x-hidden overflow-y-auto"
                        wire:ignore>
                        <div
                            class="hs-overlay-open:opacity-100 hs-overlay-open:scale-100 hs-overlay-open:duration-300 opacity-0 scale-95 transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                            <div class="flex flex-col bg-white border shadow-sm rounded-xl w-full">
                                <div class="flex justify-end items-center py-6 pb-0 px-6">
                                    <button type="button"
                                        class="hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-full text-gray-500 hover:bg-gray-300/40 duration-300 focus:outline-0 text-sm"
                                        data-hs-overlay="#delete-modal-{{ $i + 1 }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            class="w-5 h-5">
                                            <path
                                                d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="p-6 pt-4 overflow-y-auto ">
                                    <div class="flex justify-between gap-4">
                                        <div>
                                            <h5 class="font-bold text-2xl">Hapus Pesan Dari <span
                                                    class="text-blue-500">{{ $message->name }}</span></h5>
                                            <p class="text-gray-400 text-sm">{{ $message->email }}</p>
                                        </div>
                                        <div class="text-gray-400 text-sm mt-1">
                                            {{ $message->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                    <div class="mt-6 bg-gray-200 rounded-2xl p-5">
                                        <div>
                                            <h6 class="text-xl font-bold">{{ $message->subject }}</h6>
                                            <p class="mt-4 text-gray-500">{{ $message->message }}</p>
                                        </div>
                                    </div>
                                    <div class="mt-8 text-right">
                                        <button wire:click='hapus({{ $message->id }})'
                                            class="py-3 px-6 bg-red-500 text-sm
																		 text-white rounded-xl font-semibold inline-block active:scale-95 duration-300">Hapus
                                            pesan ini</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div id="deleteAll-modal"
                    class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[260] overflow-x-hidden overflow-y-auto"
                    wire:ignore>
                    <div
                        class="hs-overlay-open:opacity-100 hs-overlay-open:scale-100 hs-overlay-open:duration-300 opacity-0 scale-95 transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                        <div class="flex flex-col bg-white border shadow-sm rounded-xl w-full">
                            <div class="flex justify-end items-center py-6 pb-0 px-6">
                                <button type="button"
                                    class="hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-full text-gray-500 hover:bg-gray-300/40 duration-300 focus:outline-0 text-sm"
                                    data-hs-overlay="#delete-modal-{{ $i + 1 }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-5 h-5">
                                        <path
                                            d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                    </svg>
                                </button>
                            </div>
                            <div class="p-6 pt-4 overflow-y-auto ">
                                <div class="flex justify-between gap-4">
                                    <div>
                                        <h5 class="font-bold text-2xl">Yakin hapus <span
                                                class="text-blue-500">semua</span> pesan?</h5>
                                    </div>
                                </div>
                                <div class="mt-6 bg-gray-200 rounded-2xl p-5">
                                    <p class=" text-gray-600">
                                        Apakah Anda yakin? Pesan yang dihapus tidak akan bisa dikembalikan lagi.
                                    </p>
                                </div>
                                <div class="mt-8 text-right">
                                    <button wire:click='hapusSemua'
                                        class="py-3 px-6 bg-red-500 text-sm
																		 text-white rounded-xl font-semibold inline-block active:scale-95 duration-300">Hapus
                                        semua</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endempty
        </div>
    </div>
</div>
