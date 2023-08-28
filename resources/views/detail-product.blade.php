<x-main-layout>
    <x-slot name="title">{{ $title }}</x-slot>

    <section class="pt-14 px-5">
        <div class="max-w-6xl mx-auto">
            @livewire('products.home-detail', ['getSlug' => $slug])
        </div>
    </section>

    <section class="pt-8 px-5">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-wrap justify-center items-center -mx-4 pb-3 sm:pb-4">
                <div class="w-full sm:w-1/2 lg:w-1/3 p-4 pb-3 sm:pb-4">
                    <div
                        class="p-5 rounded-2xl bg-white flex items-center gap-x-5 shadow-lg shadow-gray-200/40 hover:scale-105 duration-300">
                        <div class="w-12 h-12 flex items-center justify-center rounded-full bg-blue-green p-2">
                            <img src="{{ asset('img/icons/fast.svg') }}" class="h-8" alt="">
                        </div>
                        <h6 class="text-xl font-semibold">Fast Delivery</h6>
                    </div>
                </div>
                <div class="w-full sm:w-1/2 lg:w-1/3 p-4 pb-3 sm:pb-4">
                    <div
                        class="p-5 rounded-2xl bg-white flex items-center gap-x-5 shadow-lg shadow-gray-200/40 hover:scale-105 duration-300">
                        <div class="w-12 h-12 flex items-center justify-center rounded-full bg-blue-green p-3">
                            <img src="{{ asset('img/icons/quality.svg') }}" class="h-8" alt="">
                        </div>
                        <h6 class="text-xl font-semibold">High Quality</h6>
                    </div>
                </div>
                <div class="w-full sm:w-1/2 lg:w-1/3 p-4 pb-3 sm:pb-4">
                    <div
                        class="p-5 rounded-2xl bg-white flex items-center gap-x-5 shadow-lg shadow-gray-200/40 hover:scale-105 duration-300">
                        <div class="w-12 h-12 flex items-center justify-center rounded-full bg-blue-green p-3">
                            <img src="{{ asset('img/icons/return.svg') }}" class="h-8" alt="">
                        </div>
                        <h6 class="text-xl font-semibold">7 Days of Return</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-8 px-5">
        <div class="max-w-6xl mx-auto">
            <nav class="relative z-0 flex overflow-hidden rounded-xl bg-white" aria-label="Tabs" role="tablist">
                <button type="button"
                    class="hs-tab-active:bg-blue-green rounded-xl hs-tab-active:text-white relative min-w-0 flex-1 bg-white py-4 px-4 text-gray-500 hover:text-gray-700 text-sm font-medium text-center overflow-hidden hover:bg-gray-50 focus:z-10 active"
                    id="description-item" data-hs-tab="#description" aria-controls="description" role="tab">
                    Deskripsi
                </button>
                <button type="button"
                    class="hs-tab-active:bg-blue-green rounded-xl hs-tab-active:text-white relative min-w-0 flex-1 bg-white py-4 px-4 text-gray-500 hover:text-gray-700 text-sm font-medium text-center overflow-hidden hover:bg-gray-50 focus:z-10"
                    id="reviews-item" data-hs-tab="#reviews" aria-controls="reviews" role="tab">
                    Penilaian
                </button>
                <button type="button"
                    class="hs-tab-active:bg-blue-green rounded-xl hs-tab-active:text-white relative min-w-0 flex-1 bg-white py-4 px-4 text-gray-500 hover:text-gray-700 text-sm font-medium text-center overflow-hidden hover:bg-gray-50 focus:z-10"
                    id="shipping-item" data-hs-tab="#shipping" aria-controls="shipping" role="tab">
                    Pengiriman
                </button>
            </nav>

            <div class="mt-6">
                <div id="description" role="tabpanel" aria-labelledby="description-item">
                    <p class="text-gray-500">
                        {!! $detail->deskripsi !!}
                    </p>
                </div>
                <div id="reviews" class="hidden" role="tabpanel" aria-labelledby="reviews-item">
                    @empty($reviews->count())
                        <div class="text-center text-gray-500">Belum ada review dari produk ini.</div>
                    @endempty
                    <div class="flex flex-wrap -mx-4">
                        @foreach ($reviews as $r)
                            <div class="w-full md:w-1/2 p-4">
                                <div
                                    class="py-3 px-8 rounded-t-2xl bg-white bg-opacity-40 sm:flex flex-wrap items-center gap-x-3 justify-between">
                                    <div class="flex items-center gap-x-5">
                                        @if ($r->user->image)
                                            <img src="{{ asset('img/profile/' . $r->user->image) }}"
                                                class="w-12 h-12 object-cover rounded-full" alt="{{ $r->user->name }}">
                                        @else
                                            <div
                                                class="w-12 h-12 flex items-center justify-center rounded-full bg-gray-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                                </svg>
                                            </div>
                                        @endif
                                        <h6 class="text-lg font-semibold">{{ $r->user->name }}</h6>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-400 text-right sm:text-left mt-2 sm:mt-0">
                                            {{ $r->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                                <div class="p-6 bg-white overflow-hidden rounded-b-2xl">
                                    <div class="mb-4 flex items-center gap-x-2">
                                        @for ($i = 0; $i < $r->rating; $i++)
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-6 h-6 text-yellow-500">
                                                <path fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        @endfor
                                    </div>
                                    <p class="text-sm leading-relaxed">
                                        {{ $r->comment }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div id="shipping" class="hidden" role="tabpanel" aria-labelledby="shipping-item">
                    <p class="text-gray-500">
                        Produk ini dikirim melalu metode <span
                            class="font-bold text-blue-green">{{ $detail->pengiriman }}</span>
                    </p>
                </div>
            </div>

        </div>
    </section>

    <section class="pt-8 lg:pt-16 px-5">
        <div class="max-w-6xl mx-auto bg-blue-green px-4 py-10 rounded-3xl">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="text-xl sm:text-2xl font-semibold text-white !leading-relaxed">
                    Produk yang dijual di Medicalife sudah terbukti 100% aman, dan juga berkualitas terbaik, serta
                    memberikan
                    jaminan kualitas terbaik kepada pelanggan.
                </h2>
            </div>
        </div>
    </section>
</x-main-layout>
