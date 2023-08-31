<x-main-layout>
    <x-slot name="title">Home</x-slot>

    <!-- banner -->

    <section class="pt-5 px-5">
        <div class="max-w-6xl mx-auto bg-blue-green/20 rounded-3xl pt-10 px-4">
            <div class="flex flex-wrap items-center -mx-5">
                <div class="w-full md:w-1/2 p-5">
                    <div class="md:max-w-lg lg:ml-20">
                        <h1
                            class="uppercase text-2xl sm:text-3xl lg:text-4xl font-black text-center md:text-left !leading-normal">
                            PUSAT LAYANAN KESEHATAN TERBAIK SE-INDONESIA</h1>
                        <p class="text-gray-500 mt-5 mb-8 text-center md:text-left">Kami akan selalu memberikan pelayanan
                            terbaik
                            untuk Anda dan keluarga</p>
                        <div class="flex items-center justify-center md:justify-start">
                            <a href=""
                                class="py-3 px-4 sm:px-5 bg-blue-green text-white rounded-xl flex items-center gap-x-3 text-xs sm:text-sm group">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="w-4 h-4 group-hover:animate-bounce">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 19.5l-15-15m0 0v11.25m0-11.25h11.25" />
                                </svg>
                                <span class="font-medium inline-block">Explore Now</span>
                            </a>
                            <a href=""
                                class="py-3 border-b-2 border-blue-green text-blue-green flex items-center gap-x-3 text-xs sm:text-sm group ml-4 sm:ml-8">
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
                    <img src="{{ asset('img/banner.png') }}" class="w-[300px] mx-auto" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- end banner -->

    <!-- about -->
    <section class="pt-8 lg:py-14 px-5" id="about">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-wrap -mx-5">
                <div class="w-full lg:w-1/2 p-5">
                    <img src="{{ asset('img/about.png') }}" class="mx-auto lg:mx-0" alt="">
                </div>
                <div class="w-full lg:w-1/2 p-5">
                    <h1 class="heading">tentang kami</h1>
                    <p class=" text-gray-500 my-6 !leading-7">Medical adalah pusat layanan kesehatan yang
                        menyediakan berbagai layanan kesehatan, seperti konsultasi dokter, rawat jalan, rawat inap, dan
                        laboratorium. Kami memiliki tim dokter dan tenaga medis yang profesional dan berpengalaman,
                        serta fasilitas
                        yang modern dan lengkap. Kami berkomitmen untuk memberikan pelayanan kesehatan yang terbaik
                        kepada Anda.</p>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-green">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-gray-800 block font-medium ">Bekerja secara profesional</span>
                        </li>
                        <li class="flex items-center gap-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-green">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-gray-800 block font-medium ">Fasilitas yang sangat lengkap</span>
                        </li>
                        <li class="flex items-center gap-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-green">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-gray-800 block font-medium ">Dokter yang berpengalaman</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end about -->

    <!-- services -->
    <section class="pt-14 lg:py-14 px-5" id="services">
        <div class="max-w-6xl mx-auto">
            <div class="grid sm:grid-cols-2 gap-4 lg:gap-6">
                <div
                    class="p-5 bg-white border border-transparent hover:border-blue-green duration-300 rounded-2xl shadow-lg shadow-gray-200">
                    <div class="flex items-center gap-x-4">
                        <div
                            class="w-11 h-11 flex items-center justify-center rounded-full bg-blue-green text-white shadow-lg shadow-blue-green/20">
                            <img src="{{ asset('img/icons/mata.svg') }}" alt="">
                        </div>
                        <span class="inline-block font-semibold text-xl">Perawatan Mata</span>
                    </div>
                    <p class="mt-4 text-sm text-gray-400 leading-relaxed">
                        Kami memiliki tim dokter mata yang profesional dan berpengalaman, serta fasilitas yang modern
                        dan lengkap.
                        Kami berkomitmen untuk memberikan pelayanan kesehatan mata yang terbaik kepada Anda.
                    </p>
                </div>
                <div
                    class="p-5 bg-white border border-transparent hover:border-blue-green duration-300 rounded-2xl shadow-lg shadow-gray-200">
                    <div class="flex items-center gap-x-4">
                        <div
                            class="w-11 h-11 flex items-center justify-center rounded-full bg-blue-green text-white shadow-lg shadow-blue-green/20">
                            <img src="{{ asset('img/icons/gigi.svg') }}" alt="">
                        </div>
                        <span class="inline-block font-semibold text-xl">Perawatan Gigi</span>
                    </div>
                    <p class="mt-4 text-sm text-gray-400 leading-relaxed">
                        Kami memiliki tim dokter gigi yang profesional dan berpengalaman, serta fasilitas yang modern
                        dan lengkap.
                        Kami berkomitmen untuk memberikan pelayanan kesehatan gigi yang terbaik kepada Anda.
                    </p>
                </div>
                <div
                    class="p-5 bg-white border border-transparent hover:border-blue-green duration-300 rounded-2xl shadow-lg shadow-gray-200">
                    <div class="flex items-center gap-x-4">
                        <div
                            class="w-11 h-11 flex items-center justify-center rounded-full bg-blue-green text-white shadow-lg shadow-blue-green/20">
                            <img src="{{ asset('img/icons/tht.svg') }}" alt="">
                        </div>
                        <span class="inline-block font-semibold text-xl">Perawatan THT</span>
                    </div>
                    <p class="mt-4 text-sm text-gray-400 leading-relaxed">
                        Kami memiliki tim dokter THT yang profesional dan berpengalaman, serta fasilitas yang modern dan
                        lengkap.
                        Kami berkomitmen untuk memberikan pelayanan kesehatan THT yang terbaik kepada Anda.
                    </p>
                </div>
                <div
                    class="p-5 bg-white border border-transparent hover:border-blue-green duration-300 rounded-2xl shadow-lg shadow-gray-200">
                    <div class="flex items-center gap-x-4">
                        <div
                            class="w-11 h-11 flex items-center justify-center rounded-full bg-blue-green text-white shadow-lg shadow-blue-green/20">
                            <img src="{{ asset('img/icons/umum.svg') }}" alt="">
                        </div>
                        <span class="inline-block font-semibold text-xl">Perawatan Umum</span>
                    </div>
                    <p class="mt-4 text-sm text-gray-400 leading-relaxed">
                        Kami memiliki tim dokter umum yang profesional dan berpengalaman, serta fasilitas yang modern
                        dan lengkap.
                        Kami berkomitmen untuk memberikan pelayanan kesehatan umum yang terbaik kepada Anda.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- end services -->

    <!-- CTA  -->
    <section class="pt-14 lg:py-14 px-5">
        <div class="max-w-6xl mx-auto">
            <div class="bg-blue-green py-16 px-4 rounded-3xl">
                <div class="max-w-xl mx-auto text-center">
                    <h6 class="text-white text-xl font-semibold !leading-relaxed">Kami berkomitmen untuk memberikan
                        pelayanan
                        kesehatan yang terbaik untuk Anda. Jika
                        Anda memiliki pertanyaan atau ingin membuat janji konsultasi, silakan hubungi kami.</h6>
                    <div class="mt-10">
                        <a href=""
                            class="inline-flex items-center gap-x-4 bg-white py-3 px-6 rounded-xl text-sm group">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 group-hover:animate-bounce">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                            </svg>
                            <span class="font-semibold">Telephone</span>
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
                <p class="mt-6 text-sm  text-gray-500 leading-relaxed">Kami menyediakan berbagai produk kesehatan yang
                    berkualitas tinggi, termasuk obat-obatan, dan alat
                    kesehatan. Produk kami dirancang untuk membantu Anda menjaga kesehatan Anda dan hidup lebih
                    baik.</p>
            </div>

            @livewire('cart.card')

            <div class="text-center mt-12">
                <a href="{{ route('all.products') }}" wire:navigate
                    class="py-3 px-4 sm:px-5 bg-blue-green text-white rounded-xl inline-flex items-center gap-x-3 text-xs sm:text-sm group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-4 h-4 group-hover:animate-bounce">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 19.5l-15-15m0 0v11.25m0-11.25h11.25" />
                    </svg>
                    <span class="font-medium inline-block">More Products</span>
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
                            <div
                                class="border-b sm:border-b-0 lg:border-b border-gray-300 mb-8 pb-8 sm:m-0 sm:p-0 lg:mb-8 lg:pb-8">
                                <div class="flex items-start gap-5">
                                    <div
                                        class="w-14 h-14 flex items-center justify-center rounded-full bg-blue-green text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h6 class="text-xl font-semibold">Our Location</h6>
                                        <p class="text-sm text-gray-500 mt-2 font-medium">Jln. Sudirman No. 108
                                            Pekanbaru, Riau</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full sm:w-1/2 lg:w-full px-5 lg:px-0">
                            <div
                                class="border-b sm:border-b-0 lg:border-b border-gray-300 mb-8 pb-8 sm:m-0 sm:p-0 lg:mb-8 lg:pb-8">
                                <div class="flex items-start gap-5">
                                    <div
                                        class="w-14 h-14 flex items-center justify-center rounded-full bg-blue-green text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h6 class="text-xl font-semibold">Our Contact</h6>
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
                        <div class="flex items-start gap-5">
                            <div
                                class="w-14 h-14 flex items-center justify-center rounded-full bg-blue-green text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                            </div>
                            <div>
                                <h6 class="text-xl font-semibold">Mail Us</h6>
                                <ul class="text-sm text-gray-500 mt-2 space-y-1">
                                    <li><a href="#"
                                            class="hover:text-blue-green duration-300 font-medium">admin@medicalife.com</a>
                                    </li>
                                    <li><a href="#"
                                            class="hover:text-blue-green duration-300 font-medium">info@medicalife.com</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6805180492806!2d101.45226847602478!3d0.476201263758819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5af205e9f4dab%3A0x78a733174779599d!2sJl.%20Jend.%20Sudirman%20No.108%2C%20Simpang%20Tiga%2C%20Kec.%20Bukit%20Raya%2C%20Kota%20Pekanbaru%2C%20Riau%2028288!5e0!3m2!1sid!2sid!4v1692415723425!5m2!1sid!2sid"
                            class="w-full mt-8 h-60 border p-3 rounded-xl border-gray-300" allowfullscreen=""
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

</x-main-layout>
