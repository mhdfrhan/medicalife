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
    @stack('link')
    @livewireStyles
</head>

<body class="font-sans antialiased">
    @include('partials.message')
    <div class="bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Content -->
        <main class="w-full px-4 sm:px-6 md:px-8 lg:pl-80 mt-8">
            {{ $slot }}
        </main>
    </div>

    <footer
        class="w-full px-4 sm:px-6 md:px-8 lg:pl-80 mt-14 pb-14 flex flex-wrap gap-4 justify-center items-center sm:justify-between text-gray-400 text-sm">
        <p>© Copyright {{ date('Y') }}. All Rights Reserved.</p>
        <p>Made by <a href="https://inifarhan.my.id" class="text-red-500 font-bold hover:underline"
                target="_blank">Farhan</a></p>
    </footer>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @stack('script')
    @livewireScripts
</body>

</html>
