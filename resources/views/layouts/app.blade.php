<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="cupcake">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {!! ToastMagic::styles() !!}

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-stone-50">
    <!-- Header -->
    @include('navbar')

    <main class="pt-20">
        @yield('content')
    </main>

    {!! ToastMagic::scripts() !!}

</body>

</html>
