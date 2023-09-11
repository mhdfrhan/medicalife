<x-main-layout>
    <x-slot name="title">Home</x-slot>

    <!-- banner -->

    <section class="pt-5 px-5">
        <div class="max-w-6xl mx-auto bg-blue-500/30 rounded-[2rem] pt-10 px-4">
            <div class="flex flex-wrap items-center -mx-5">
                <div class="w-full md:w-1/2 p-5">
                    <div class="md:max-w-lg lg:ml-20">
                        <h1
                            class="uppercase text-2xl sm:text-3xl lg:text-4xl font-black text-center md:text-left !leading-normal">
                            PUSAT LAYANAN KESEHATAN TERBAIK SE-
                            <span class="relative">
                                INDONESIA
                                <img src="{{ asset('img/circle.svg') }}"
                                    class="absolute top-1/2 -translate-y-1/2 left-0 right-0 scale-110" alt="">
                            </span>
                        </h1>
                        <p class="text-gray-500 mt-5 mb-8 text-center md:text-left">Kami akan selalu memberikan
                            pelayanan
                            terbaik
                            untuk Anda dan keluarga</p>
                        <div class="flex items-center justify-center md:justify-start">
                            <a href=""
                                class="py-3 px-4 sm:px-5 bg-blue-500 text-white rounded-xl flex items-center gap-x-3 text-xs sm:text-sm group">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="w-4 h-4 animate-bounce">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 19.5l-15-15m0 0v11.25m0-11.25h11.25" />
                                </svg>
                                <span class="font-medium inline-block">Explore Now</span>
                            </a>
                            <a href=""
                                class="py-3 border-b-2 border-blue-500 text-blue-500 flex items-center gap-x-3 text-xs sm:text-sm group ml-4 sm:ml-8">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="w-4 h-4 group-hover:animate-bounce">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 19.5l-15-15m0 0v11.25m0-11.25h11.25" />
                                </svg>
                                <span class="font-medium inline-block">Emergency Call</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 p-5 pb-0">
                    <img src="{{ asset('img/banner.png') }}"
                        class="w-[300px] mx-auto max-h-[450px] object-cover object-top sm:max-h-max" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- end banner -->

    <!-- about -->
    <section class="pt-8 lg:py-14 px-5" id="about">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-wrap items-center -mx-5">
                <div class="w-full lg:w-1/2 p-5 overflow-hidden">
                    <img src="{{ asset('img/about.png') }}" class="mx-auto lg:mx-0 rounded-tl-[2rem] rounded-br-[2rem]"
                        alt="">
                </div>
                <div class="w-full lg:w-1/2 p-5 overflow-hidden">
                    <h1 class="heading">tentang kami</h1>
                    <p class=" text-gray-500 text-sm my-6 !leading-7">Medical adalah pusat layanan kesehatan yang
                        menyediakan berbagai layanan kesehatan, seperti konsultasi dokter, rawat jalan, rawat inap,
                        dan
                        laboratorium. Kami memiliki tim dokter dan tenaga medis yang profesional dan berpengalaman,
                        serta fasilitas
                        yang modern dan lengkap. Kami berkomitmen untuk memberikan pelayanan kesehatan yang terbaik
                        kepada Anda.</p>
                    <p class=" text-gray-500 text-sm my-6 !leading-7">
                        Medicalife beralamat dijalan Sudirman No. 108 Pekanbaru, Riau. Lokasi strategis kami membuat
                        akses ke fasilitas kesehatan ini menjadi lebih nyaman bagi pasien.
                    </p>
                </div>
            </div>
            <div class="flex flex-wrap items-center -mx-5 lg:mt-16">
                <div class="w-full lg:w-1/2 p-5 order-2 lg:order-1 overflow-hidden">
                    <h1 class="heading">fasilitas yang sangat lengkap</h1>
                    <p class=" text-gray-500 text-sm my-6 !leading-7">Medicalife menyediakan fasilitas kesehatan yang
                        lengkap dan berkualitas, mulai dari rawat inap hingga rawat jalan. Fasilitas kesehatan ini
                        didukung oleh tenaga medis yang profesional dan berpengalaman, serta teknologi medis yang
                        canggih. <br><br>
                        Selain itu, Medicalife juga mengutamakan pelayanan yang ramah dan bersahabat kepada setiap
                        pasien, dengan tujuan untuk memberikan pengalaman perawatan yang nyaman dan aman.
                    </p>

                </div>
                <div class="w-full lg:w-1/2 p-5 order-1 lg:order-2">
                    <img src="{{ asset('img/fasilitas.svg') }}" class="mx-auto lg:ml-auto slideUpDown" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- end about -->

    <!-- services -->
    <section class="pt-14 lg:py-14 px-5" id="services">
        <div class="max-w-6xl mx-auto">
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
                <div class="overflow-hidden rounded-2xl">
                    <div
                        class="p-5 bg-white border border-transparent rounded-2xl shadow-lg shadow-gray-200 relative group hover:bg-blue-500 duration-300 overflow-hidden">
                        <div
                            class="absolute -top-10 -left-10 bg-blue-500 w-28 shadow-lg shadow-blue-500/30 h-28 rounded-full duration-500 group-hover:inset-0 group-hover:rounded-br-full group-hover:w-20 group-hover:h-20 group-hover:rounded-none">
                        </div>
                        <img src="{{ asset('img/icons/mata.svg') }}"
                            class="w-9 h-9 -translate-x-1.5 -translate-y-1.5 group-hover:translate-x-0 group-hover:translate-y-0 duration-500 relative z-10"
                            alt="">
                        <div class="relative z-10 mt-8">
                            <span
                                class="inline-block font-semibold text-xl group-hover:text-white duration-300">Perawatan
                                Mata</span>
                            <p
                                class="mt-3 text-sm text-gray-400 leading-relaxed group-hover:text-gray-200 duration-300">
                                Kami berkomitmen untuk memberikan perawatan mata terbaik yang akan menjaga kualitas
                                penglihatan Anda.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="overflow-hidden rounded-2xl">
                    <div
                        class="p-5 bg-white border border-transparent rounded-2xl shadow-lg shadow-gray-200 relative group hover:bg-blue-500 duration-300 overflow-hidden">
                        <div
                            class="absolute -top-10 -left-10 bg-blue-500 w-28 shadow-lg shadow-blue-500/30 h-28 rounded-full duration-500 group-hover:inset-0 group-hover:rounded-br-full group-hover:w-20 group-hover:h-20 group-hover:rounded-none">
                        </div>
                        <img src="{{ asset('img/icons/gigi.svg') }}"
                            class="w-8 h-8 -translate-x-1.5 -translate-y-1.5 group-hover:translate-x-0 group-hover:translate-y-0 duration-500 relative z-10"
                            alt="">
                        <div class="relative z-10 mt-8">
                            <span
                                class="inline-block font-semibold text-xl group-hover:text-white duration-300">Perawatan
                                Gigi</span>
                            <p
                                class="mt-3 text-sm text-gray-400 leading-relaxed group-hover:text-gray-200 duration-300">
                                Kami berkomitmen untuk memberikan perawatan kesehatan gigi terbaik yang akan menjaga
                                senyum dan kesehatan gigi Anda.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="overflow-hidden rounded-2xl">
                    <div
                        class="p-5 bg-white border border-transparent rounded-2xl shadow-lg shadow-gray-200 relative group hover:bg-blue-500 duration-300 overflow-hidden">
                        <div
                            class="absolute -top-10 -left-10 bg-blue-500 w-28 shadow-lg shadow-blue-500/30 h-28 rounded-full duration-500 group-hover:inset-0 group-hover:rounded-br-full group-hover:w-20 group-hover:h-20 group-hover:rounded-none">
                        </div>
                        <img src="{{ asset('img/icons/tht.svg') }}"
                            class="w-8 h-8 -translate-x-1.5 -translate-y-1.5 group-hover:translate-x-0 group-hover:translate-y-0 duration-500 relative z-10"
                            alt="">
                        <div class="relative z-10 mt-8">
                            <span
                                class="inline-block font-semibold text-xl group-hover:text-white duration-300">Perawatan
                                THT</span>
                            <p
                                class="mt-3 text-sm text-gray-400 leading-relaxed group-hover:text-gray-200 duration-300">
                                Kami berkomitmen untuk memberikan perawatan kesehatan THT terbaik untuk masalah telinga,
                                hidung, dan tenggorokan Anda.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="overflow-hidden rounded-2xl">
                    <div
                        class="p-5 bg-white border border-transparent rounded-2xl shadow-lg shadow-gray-200 relative group hover:bg-blue-500 duration-300 overflow-hidden">
                        <div
                            class="absolute -top-10 -left-10 bg-blue-500 w-28 shadow-lg shadow-blue-500/30 h-28 rounded-full duration-500 group-hover:inset-0 group-hover:rounded-br-full group-hover:w-20 group-hover:h-20 group-hover:rounded-none">
                        </div>
                        <img src="{{ asset('img/icons/umum.svg') }}"
                            class="w-8 h-8 -translate-x-1.5 -translate-y-1.5 group-hover:translate-x-0 group-hover:translate-y-0 duration-500 relative z-10"
                            alt="">
                        <div class="relative z-10 mt-8">
                            <span
                                class="inline-block font-semibold text-xl group-hover:text-white duration-300">Perawatan
                                Umum</span>
                            <p
                                class="mt-3 text-sm text-gray-400 leading-relaxed group-hover:text-gray-200 duration-300">
                                Kami berkomitmen untuk memberikan perawatan kesehatan umum yang terbaik untuk menjaga
                                kesehatan dan kesejahteraan Anda.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end services -->

    <!-- CTA  -->
    <section class="pt-14 lg:py-14 px-5">
        <div class="max-w-6xl mx-auto">
            <div class="bg-blue-500 py-16 px-4 rounded-3xl">
                <div class="max-w-xl mx-auto text-center">
                    <h6 class="text-white text-xl font-semibold !leading-relaxed">Kami berkomitmen untuk memberikan
                        pelayanan
                        kesehatan yang terbaik untuk Anda. Jika
                        Anda memiliki pertanyaan atau ingin membuat janji konsultasi, silakan hubungi kami.</h6>
                    <div class="mt-10">
                        <a href=""
                            class="inline-flex items-center gap-x-4 bg-white py-3 px-6 rounded-xl text-sm group">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 animate-bounce">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                            </svg>
                            <span class="font-semibold">Hubungi Kami</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end CTA  -->

    {{-- product --}}
    <section class="pt-14 lg:py-14 px-5" id="products">
        <div class="max-w-6xl mx-auto">
            <div class="max-w-3xl mx-auto text-center mb-12">
                <h1 class="heading">produk kami</h1>
                <p class="mt-6 text-sm  text-gray-500 leading-relaxed">Kami menyediakan berbagai produk kesehatan
                    yang
                    berkualitas tinggi, termasuk obat-obatan, dan alat
                    kesehatan. Produk kami dirancang untuk membantu Anda menjaga kesehatan Anda dan hidup lebih
                    baik.</p>
            </div>

            @livewire('cart.card')

            <div class="text-center mt-12">
                <a href="{{ route('all.products') }}" wire:navigate
                    class="py-3 px-4 sm:px-5 bg-blue-500 text-white shadow-lg shadow-blue-500/30 rounded-xl inline-flex items-center gap-x-3 text-xs sm:text-sm group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4 animate-bounce">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                    </svg>
                    <span class="font-medium inline-block">Semua Produk</span>
                </a>
            </div>
        </div>
    </section>
    {{-- end product --}}

    <!-- contact -->
    <section class="pt-14 lg:py-14 px-5" id="contact">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-wrap items-stretch -mx-5">
                <div class="w-full lg:w-1/3 p-5">
                    <div
                        class="flex flex-wrap items-center -mx-5 sm:border-b sm:border-gray-300 sm:mb-8 sm:pb-8 lg:border-b-0 lg:m-0 lg:p-0">
                        <div class="w-full sm:w-1/2 lg:w-full px-5 lg:px-0">
                            <div class="border sm:border-b-0 lg:border-b border-gray-200 p-8 rounded-2xl mb-3">
                                <div class="flex items-start gap-5">
                                    <div
                                        class="w-14 h-14 flex shrink-0 items-center justify-center rounded-full bg-blue-500 text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h6 class="text-xl font-semibold">Lokasi Kami</h6>
                                        <p class="text-sm text-gray-500 mt-2 font-medium">Jln. Sudirman No. 108
                                            Pekanbaru, Riau</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full sm:w-1/2 lg:w-full px-5 lg:px-0">
                            <div class="border sm:border-b-0 lg:border-b border-gray-200 p-8 rounded-2xl mb-3">
                                <div class="flex items-start gap-5">
                                    <div
                                        class="w-14 h-14 flex shrink-0 items-center justify-center rounded-full bg-blue-500 text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h6 class="text-xl font-semibold">Kontak Kami</h6>
                                        <ul class="text-sm text-gray-500 mt-2 space-y-1 font-medium">
                                            <li>+62 823 3749 8372</li>
                                            <li>+62 852 7238 0582</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="border sm:border-b-0 lg:border-b border-gray-200 p-8 rounded-2xl mb-3">
                            <div class="flex items-start gap-5">
                                <div
                                    class="w-14 h-14 flex shrink-0 items-center justify-center rounded-full bg-blue-500 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                    </svg>
                                </div>
                                <div>
                                    <h6 class="text-xl font-semibold">Email</h6>
                                    <ul class="text-sm text-gray-500 mt-2 space-y-1">
                                        <li><a href="#"
                                                class="hover:text-blue-500 duration-300 font-medium">admin@medicalife.com</a>
                                        </li>
                                        <li><a href="#"
                                                class="hover:text-blue-500 duration-300 font-medium">info@medicalife.com</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6805180492806!2d101.45226847602478!3d0.476201263758819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5af205e9f4dab%3A0x78a733174779599d!2sJl.%20Jend.%20Sudirman%20No.108%2C%20Simpang%20Tiga%2C%20Kec.%20Bukit%20Raya%2C%20Kota%20Pekanbaru%2C%20Riau%2028288!5e0!3m2!1sid!2sid!4v1692415723425!5m2!1sid!2sid"
                            class="w-full mt-3 h-60 border p-3 rounded-xl border-gray-200" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="w-full lg:w-2/3 p-5">
                    <div class="p-6 lg:p-8 bg-gray-800 rounded-3xl">
                        <h1 class="heading text-white">Hubungi kami</h1>
                        <p class="mt-2 text-sm text-gray-400 max-w-lg">
                            Jika Anda memiliki pertanyaan atau ingin informasi lebih lanjut tentang layanan kami,
                            silakan hubungi
                            kami.
                        </p>
                        <div class="mt-8">
                            @livewire('contact.send')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end contact -->


    {{-- article --}}

    <section class="pt-14 lg:py-14 px-5" id="article">
        <div class="max-w-6xl mx-auto">
            <div class="max-w-3xl mx-auto text-center mb-12">
                <h1 class="heading">artikel</h1>
                <p class="mt-6 text-sm  text-gray-500 leading-relaxed">Temukan artikel-artikel berguna tentang
                    pencegahan penyakit, pola makan seimbang, olahraga yang efektif, serta informasi mengenai berbagai
                    kondisi medis.</p>
            </div>
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
            <div class="text-center mt-12">
                <a href="{{ route('articles') }}" wire:navigate
                    class="py-3 px-4 sm:px-5 bg-blue-500 text-white shadow-lg shadow-blue-500/30 rounded-xl inline-flex items-center gap-x-3 text-xs sm:text-sm group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4 animate-bounce">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                    </svg>
                    <span class="font-medium inline-block">Semua Artikel</span>
                </a>
            </div>
        </div>
    </section>

    {{-- end article --}}



</x-main-layout>
