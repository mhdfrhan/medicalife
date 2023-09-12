<div>
    <div class="mb-4 flex items-center justify-end gap-3">
        <div>
            <input type="radio" id="terbaru" name="sort" wire:model.live='sort' class="peer hidden" value="terbaru">
            <label for="terbaru"
                class="bg-gray-200 py-2 px-4 rounded-lg font-medium cursor-pointer peer-checked:bg-blue-500 peer-checked:text-white hover:bg-gray-300 duration-300">Terbaru</label>
        </div>
        <div>
            <input type="radio" id="terlama" name="sort" wire:model.live='sort' class="peer hidden" value="terlama">
            <label for="terlama"
                class="bg-gray-200 py-2 px-4 rounded-lg font-medium cursor-pointer peer-checked:bg-blue-500 peer-checked:text-white hover:bg-gray-300 duration-300">Terlama</label>
        </div>
    </div>

    @empty($articles->count())
        <div class="text-center text-sm text-neutral-500">Belum ada artikel saat ini.</div>
    @else
        <div class="flex flex-wrap items-stretch -mx-4">
            @foreach ($articles as $article)
                <div class="w-full sm:w-1/2 lg:w-1/3  p-4">
                    <div>
                        <img class="rounded-2xl" src="{{ asset('img/articles/' . $article->image) }}"
                            alt="{{ $article->title }}">
                    </div>
                    <div class="-mt-4 rounded-t-none bg-white rounded-2xl p-6 pt-8">
                        <a href="{{ route('article.show', $article->slug) }}" wire:navigate
                            class="hover:text-blue-500 duration-300">
                            <h5 class="font-semibold text-lg line-clamp-2">{{ $article->title }}</h5>
                        </a>
                        <div class="mt-3 text-gray-400 text-sm text-right">
                            {{ $article->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endempty
</div>
