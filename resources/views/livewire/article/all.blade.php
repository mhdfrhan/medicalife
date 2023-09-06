<div>
    @include('partials.message')
    <div class="sm:flex items-center justify-between">
        <div>
            <h1 class="heading !capitalize !font-bold">Semua Artikel</h1>
            <ul class="flex items-center gap-x-6 mt-6">
                <li class="text-sm text-gray-500 font-bold">
                    Semua ({{ $allTotal }})
                </li>
                <li class="text-sm text-gray-500 font-bold">
                    <span class="text-blue-500">Publish</span> ({{ $drafts }})
                </li>
                <li class="text-sm text-gray-500 font-bold">
                    <span class="text-blue-500">Draft</span> ({{ $publish }})
                </li>
            </ul>
        </div>
        <div class="mt-6 sm:mt-0 text-right">
            <a href="{{ route('tambah.article') }}" wire:navigate
                class="py-2.5  px-4 text-center bg-blue-500 text-sm text-white rounded-lg font-semibold hover:opacity-80 duration-300 shadow-lg shadow-blue-500/30">
                Tambah Artikel</a>
        </div>
    </div>

    <div class="mt-14">
        <div class="max-w-xs mb-8 mx-auto">
            <input type="text" class="input-form" wire:model.live='search' placeholder="ketik sesuatu disini...">
        </div>

        <div class=" bg-white p-6 rounded-2xl shadow-lg shadow-gray-200/20">
            <div class="w-full overflow-x-auto ">
                <div class=" min-w-max ">
                    @empty($articles->count())
                        <div class="text-center text-sm text-neutral-500">Belum ada artikel saat ini.</div>
                    @else
                        <table class="divide-y divide-gray-300 table ">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left">
                                        <input type="checkbox" class="checkbox">
                                    </th>
                                    <th scope="col">
                                        Image
                                    </th>
                                    <th scope="col">
                                        Judul
                                    </th>
                                    <th scope="col">
                                        Status
                                    </th>
                                    <th scope="col">
                                        Created At
                                    </th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $i => $article)
                                    <tr>
                                        <td><input type="checkbox" class="checkbox"></td>
                                        <td>
                                            <img src="{{ asset('img/articles/' . $article->image) }}"
                                                alt="{{ $article->title }}" class="h-14 object-cover rounded-lg">
                                        </td>
                                        <td>
                                            <a class="hover:text-blue-500" href="{{ route('article.show', $article->slug) }}" wire:navigate>
                                                {{ $article->title }}
                                            </a>
                                        </td>
                                        <td wire:click='changeStatus({{ $article->id }})' class="cursor-pointer">
                                            <div class="hs-tooltip inline-block">
                                                @if ($article->status === 1)
                                                    <div
                                                        class="hs-tooltip-toggle bg-green-400/60 border border-green-500 text-green-800 text-center inline-block px-3 py-0.5 text-xs rounded-full font-medium">
                                                        Publish
                                                        <span
                                                            class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-md shadow-sm dark:bg-slate-700"
                                                            role="tooltip">
                                                            Unpublish?
                                                        </span>
                                                    </div>
                                                @else
                                                    <div
                                                        class="hs-tooltip-toggle bg-rose-400/60 border border-rose-500 text-rose-800 text-center inline-block px-3 py-0.5 text-xs rounded-full font-medium">
                                                        Unpublish
                                                        <span
                                                            class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-md shadow-sm dark:bg-slate-700"
                                                            role="tooltip">
                                                            Publish?
                                                        </span>
                                                    </div>
                                                @endif

                                            </div>
                                        </td>
                                        <td class="text-gray-400" wire:poll.60s>{{ $article->created_at->diffForHumans() }}
                                        </td>
                                        <td>
                                            <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                                <button id="dropdown-1"
                                                    class="hs-dropdown-toggle w-8 h-8 flex items-center justify-center hover:bg-gray-200 rounded-lg duration-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                                    </svg>
                                                </button>
                                                <div
                                                    class="hs-dropdown-menu w-40 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden z-10 !-mt-2">
                                                    <div class="hs-dropdown-open:ease-in hs-dropdown-open:opacity-100 hs-dropdown-open:scale-100 transition ease-out opacity-0 scale-95 duration-200 origin-top-right min-w-[1rem] bg-white shadow-lg shadow-gray-200 rounded-lg p-2"
                                                        aria-labelledby="dropdown-1" data-hs-transition>
                                                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100"
                                                            href="{{ route('article.show', $article->slug) }}"
                                                            wire:navigate>
                                                            View
                                                        </a>
                                                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 mb-3 pb-3 border-b"
                                                            href="{{ route('edit.article', $article->slug) }}"
                                                            wire:navigate>
                                                            Edit
                                                        </a>
                                                        <button
                                                            class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-red-600 hover:bg-gray-100 w-full"
                                                            data-hs-overlay="#alert-delete-{{ $i + 1 }}">
                                                            Delete
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <div id="alert-delete-{{ $i + 1 }}"
                                        class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[200] overflow-x-hidden overflow-y-auto">
                                        <div
                                            class="hs-overlay-open:mt-2 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                                            <div class="flex flex-col bg-white border shadow-sm rounded-xl">
                                                <div class="flex justify-end py-3 px-4">
                                                    <button type="button"
                                                        class="hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm"
                                                        data-hs-overlay="#alert-delete-{{ $i + 1 }}">
                                                        <span class="sr-only">Close</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="p-6 pt-0 flex items-start gap-6">
                                                    <div
                                                        class="w-14 h-14 rounded-full flex items-center justify-center bg-rose-500 shrink-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-7 h-7 text-white">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <h5 class="text-xl font-bold">Apakah Anda yakin ingin menghapus
                                                            artikel
                                                            ini?</h5>
                                                        <p class="text-sm text-gray-500 mt-2">Apabila dihapus, artikel ini
                                                            tidak
                                                            dapat di pulihkan kembali, dan akan dihapus secara permanen.</p>
                                                    </div>
                                                </div>
                                                <div class="flex justify-end items-center gap-x-2 py-3 px-4 pb-6">
                                                    <button type="button"
                                                        class="hs-dropdown-toggle py-2.5 px-4 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none text-sm duration-300"
                                                        data-hs-overlay="#alert-delete-{{ $i + 1 }}">
                                                        Close
                                                    </button>
                                                    <button wire:click='deleteArticle({{ $article->id }})'
                                                        class="py-2.5 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-rose-500 text-white hover:bg-rose-600 focus:outline-none text-sm duration-300">
                                                        Delete Article
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    @endempty
                </div>
            </div>
        </div>

    </div>
</div>
