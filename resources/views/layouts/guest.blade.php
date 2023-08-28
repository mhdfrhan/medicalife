<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col px-4 justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <a href="/" wire:navigate class="mb-5">
            <img src="{{ asset('img/logo.svg') }}" class="w-32 mx-auto" alt="{{ config('app.name', 'Laravel') }}">
        </a>
        <div class="w-full sm:max-w-md p-6 bg-white shadow-lg shadow-gray-200/50 overflow-hidden rounded-xl">
					{{ $slot }}
        </div>
    </div>

    @livewireScripts
</body>

</html>
