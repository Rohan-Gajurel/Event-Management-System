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
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-10 sm:pt-0 bg-gradient-to-b from-indigo-50 to-white">
            {{-- <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div> --}}

            <div class="w-full max-w-md px-4">
                <div class="mb-6 text-center">
                    <a href="{{ route('event_list') }}" class="inline-flex items-center gap-2">
                        <span class="grid h-10 w-10 place-items-center rounded-xl bg-indigo-600 text-white shadow-sm">E</span>
                        <span class="text-lg font-extrabold tracking-tight text-slate-900">{{ config('app.name', 'EventMgmt') }}</span>
                    </a>
                    <p class="mt-2 text-sm text-slate-600">Sign in to manage your bookings and events.</p>
                </div>

                <div class="card">
                    <div class="card-body">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
