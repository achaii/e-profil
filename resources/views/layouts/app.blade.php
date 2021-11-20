<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'E-Profil') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="flex flex-col h-screen min-h-screen bg-gray-100 shadow-lg">
            @include('layouts.navigation')
            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto bg-gray-200 shadow-lg">
                {{ $slot }}
            </main>
        </div>

        @livewireScripts
        @stack('js')
    </body>
</html>
