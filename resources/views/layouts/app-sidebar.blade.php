<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div x-data="{ openSidebar: false }" class="min-h-screen bg-gray-100">
        <!-- Sidebar header -->
        @include('partials.sidebar-header')

        <!-- Sidebar -->
        @include('layouts.sidebar-navigation')

        <!-- Content -->
        <main class="flex-1 mt-20">
            <div class="max-w-7xl md:ml-64 mx-auto px-4 sm:px-6 md:px-8">
                <!-- Replace with your content -->
                <div class="py-4">
                    {{ $slot }}
                </div>
                <!-- /End replace -->
            </div>
        </main>

</body>

</html>