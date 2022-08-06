<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            @if (Session::has('success'))
                <div class="flex justify-center items-center py-3 px-6 bg-green-200 text-green-800">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif

            @if (Session::has('error'))
                <div class="flex justify-center items-center py-3 px-6 bg-red-200 text-red-800">
                    <p>{{ Session::get('error') }}</p>
                </div>
            @endif

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}

                <x-auction-info-popup />
            </main>
        </div>
    </body>
</html>
