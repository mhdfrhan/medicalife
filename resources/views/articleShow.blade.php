<x-main-layout>
    <x-slot name="title">{{ $title }}</x-slot>

    <section class="pt-14 px-5">
        <div class="max-w-6xl mx-auto">
            <div class="mb-14">
                <a href="{{ route('articles') }}" wire:navigate
                    class="w-14 h-14 flex items-center justify-center rounded-full bg-blue-500 shadow-lg shadow-blue-500/30 text-white mb-8">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                    </svg>
                </a>
            </div>
            <div class="lg:hidden mb-10">
                <h2 class="text-center font-bold capitalize">{{ $article->title }}</h2>
            </div>
            <img src="{{ asset('img/articles/' . $article->image) }}" alt="{{ $article->title }}"
                class="rounded-2xl md:rounded-[2rem] w-full object-cover">

            <div class="mt-6">
                <div class="sm:flex items-center justify-between">
                    <ol class="flex items-center whitespace-nowrap min-w-0" aria-label="Breadcrumb">
                        <li class="text-sm">
                            <a class="flex items-center text-gray-500 hover:text-blue-600" href="/" wire:navigate>
                                Home
                                <svg class="flex-shrink-0 mx-3 overflow-visible h-2.5 w-2.5 text-gray-400 dark:text-gray-600"
                                    width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                </svg>
                            </a>
                        </li>
                        <li class="text-sm">
                            <a class="flex items-center text-gray-500 hover:text-blue-600"
                                href="{{ route('articles') }}" wire:navigate>
                                Articles
                                <svg class="flex-shrink-0 mx-3 overflow-visible h-2.5 w-2.5 text-gray-400 dark:text-gray-600"
                                    width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                </svg>
                            </a>
                        </li>
                        <li class="text-sm font-semibold text-gray-800 truncate dark:text-gray-200" aria-current="page">
                            {{ $article->title }}
                        </li>
                    </ol>
                    <div class="text-sm text-gray-400 flex items-center gap-2 mt-4 justify-end sm:justify-start">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ $article->created_at->diffForHumans() }}
                    </div>
                </div>
            </div>

            <div class="mt-14" id="blogContent">
                <h2 class="text-center font-bold hidden lg:block capitalize">{{ $article->title }}</h2>
                <div class="mt-10 text-gray-700 font-medium">
                    {!! $article->content !!}
                </div>
            </div>
        </div>
    </section>
</x-main-layout>
