<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') . ' | ' . $title }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    @stack('link')
    @livewireStyles
</head>

<body class="font-sans antialiased" id="home">

    @include('partials.message')
    @include('partials.navbar')

    <main class="min-h-screen">
        {{ $slot }}
    </main>

    @include('partials.footer')

    {{-- <script src="{{ asset('js/preline.js') }}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="https://www.jqueryscript.net/demo/hover-extended-magnify/extm.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @stack('script')
    @livewireScripts
</body>

</html>
