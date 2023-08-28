<div>
    @include('partials.message')
    <div class="flex flex-wrap -mx-5">
        @livewire('profile.menu')
        <div class="w-full lg:w-[70%] p-5">
            <h5 class="label !text-xl">Your Review</h5>
            <div class="p-5 bg-white rounded-2xl">
                @empty($review->count())
                    <div class="text-center text-sm text-gray-400">Belum ada ulasan apapun dari Anda</div>
                @else
                    <div class="flex flex-wrap -mx-4">
                        @foreach ($review as $r)
                            <div class="w-full lg:w-1/2 p-4">
                                <div class="border p-5 rounded-xl">
                                    <div class="flex gap-4">
                                        <img src="{{ asset('img/products/' . $r->product->images->first()->image) }}"
                                            class="w-16 rounded-lg object-cover shrink-0 h-16" alt="">
                                        <div>
                                            <div class="label !m-0 hover:text-blue-green duration-300">
                                                <a href="{{ route('user.review', strtolower($r->invoice)) }}" wire:navigate>
                                                    {{ $r->product->judul }}
                                                </a>
                                            </div>
                                            <div>
                                                <span
                                                    class="text-sm text-gray-500 mt-1">{{ $r->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex items-center mt-3 justify-end">
                                            @for ($i = 0; $i < $r->rating; $i++)
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="w-5 h-5 text-yellow-500">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            @endfor
                                        </div>
                                        <div class="mt-3 text-sm text-gray-500">
                                            {{ $r->comment }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endempty
            </div>
        </div>
    </div>
</div>
