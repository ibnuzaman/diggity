<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net"> --}}
    {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-inter">
    <div class="min-h-screen bg-ghost-white dark:bg-gray-900">

        <div class="fixed z-50 flex flex-col items-center lg:gap-6 xl:gap-12 lg:right-16 xl:right-24 bottom-24">
            <div id="goToTopButton" class="p-2 border-4 border-white rounded-full hover:cursor-pointer">
                <x-svgs.arrow class="text-white -rotate-90 lg:size-8 xl:size-8"></x-svgs.arrow>
            </div>
            <img src="{{ asset('asset/icons/whatsapp.png') }}" alt="whatsapp logo" class="size-14">
        </div>

        <livewire:layout.navbar />

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow dark:bg-gray-800">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
