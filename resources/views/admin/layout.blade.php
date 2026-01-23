<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Event Management') }} • Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-slate-50">
        <div class="flex min-h-screen">
            @include('admin.sidebar')

            <div class="flex min-w-0 flex-1 flex-col">
                <header class="border-b border-slate-200/70 bg-white">
                    <div class="container-page py-4">
                        @include('admin.navbar')
                    </div>
                </header>

                <main class="flex-1">
                    <div class="container-page py-8">
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
    </div>
</body>
</html>