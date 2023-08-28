<div>
    @include('partials.message')
    <div class="flex flex-wrap -mx-5">
        @livewire('profile.menu')
        <div class="w-full lg:w-[70%] p-5">
            <h5 class="label !text-xl">{{ $userReviews  ? "Your" : 'Add'}} Review</h5>
            <div class="p-5 bg-white rounded-2xl">
                <div class="mb-8">
                    <div class="flex flex-wrap -mx-4">
                        <div class="w-full lg:w-[70%] px-4">
                            <div class="sm:flex sm:gap-4">
                                <img src="{{ asset('img/products/' . $sales->product->images->first()->image) }}"
                                    alt="" class="w-28 object-cover rounded-lg">
                                <div>
                                    <h6 class="font-bold capitalize line-clamp-2">
                                        {{ $sales->product->judul }}
                                    </h6>
                                    <p class="text-sm text-gray-500 my-1">Quantity: {{ $sales->quantity }}</p>
                                    <h5 class="text-lg font-bold">Rp. {{ number_format($sales->total_price) }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="w-full lg:w-[30%] px-4 text-right">
                            <div class="flex flex-col h-full">
                                <div>
                                    <span class="text-sm capitalize text-blue-green font-bold">
                                        {{ ucwords(str_replace('_', ' ', $sales->status)) }}
                                    </span>
                                    <span
                                        class="block text-sm text-gray-500 mt-2 font-semibold">#{{ $sales->invoice }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($userReviews)
                    <div class="inline-flex items-center gap-4">
                        <h6 class="label !m-0">{{ Auth::user()->name }}</h6>
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-5 h-5 text-yellow-500">
                                <path fill-rule="evenodd"
                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                    clip-rule="evenodd" />
                            </svg>
														<span class="font-semibold text-gray-500">{{ $userReviews->rating }}</span>
                        </div>
                    </div>
										<div class="mt-5">
											{{ $userReviews->comment }}
										</div>
                @else
                    <div>
                        <div class="flex items-center gap-2 justify-center">
                            @for ($i = 0; $i < 5; $i++)
                                <div>
                                    <input type="radio" wire:model.live="rating" id="star-{{ $i + 1 }}"
                                        name="rating" value="{{ $i + 1 }}" class="hidden peer" />
                                    <label
                                        class="cursor-pointer font-semibold text-gray-400 px-4 py-2 flex items-center border rounded-full gap-4 peer-checked:border-yellow-500 peer-checked:text-yellow-500 peer-checked:bg-opacity-60 peer-checked:bg-yellow-200"
                                        for="star-{{ $i + 1 }}" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-5 h-5">
                                            <path fill-rule="evenodd"
                                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="inline-block">{{ $i + 1 }}</span>
                                    </label>
                                </div>
                            @endfor
                        </div>
                        @error('rating')
                            <span class="error-msg">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-5">
                        <textarea wire:model.live='review' cols="30" rows="5" class="input-form"
                            placeholder="{{ $placeholderTexts[$rating] }}"></textarea>
                        @error('review')
                            <span class="error-msg">{{ $message }}</span>
                        @enderror
                    </div>
                    <button wire:click='submitReview'
                        class="w-full mt-6 py-3 bg-blue-green text-white rounded-lg font-semibold text-sm active:scale-95 duration-300">Submit
                        Review</button>
                @endif
            </div>
        </div>
    </div>
</div>
