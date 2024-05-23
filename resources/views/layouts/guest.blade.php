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
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gradient-to-br from-green-500 to-green-700">
            <div class="flex items-center space-x-4 mt-20">
                <a href="/" class="flex items-end">
                    <img src="{{asset("img/logo_blanco.png")}}" alt="petconnect-logo" class="h-20 w-20 rounded">
                    <h1 class="text-white text-6xl font-extrabold">PetConnect</h1>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white border-4 border-green-600 shadow-lg rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
