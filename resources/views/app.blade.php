<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Scholarship') }}</title>

    @laravelPWA

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:500,600|montserrat:700" rel="stylesheet" />

    <!-- Scripts -->
    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    <script>
        window.Laravel = {!! json_encode([      'csrfToken' => csrf_token(),    ]) !!};
    </script>
    @inertiaHead
</head>

<body class="font-inter antialiased">
    @inertia
</body>

</html>