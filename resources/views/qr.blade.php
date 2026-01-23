<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Event Management') }} • QR</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <section class="page-section">
        <div class="container-page">
            <div class="mx-auto max-w-md">
                <div class="card">
                    <div class="card-body text-center">
                        <h1 class="text-xl font-extrabold tracking-tight text-slate-900">Ticket QR</h1>
                        <p class="mt-1 text-sm text-slate-600">Scan to verify validity.</p>

                        <div class="mt-6 grid place-items-center rounded-2xl bg-white p-6 ring-1 ring-slate-200">
                            <div class="[&>svg]:h-52 [&>svg]:w-52 [&>svg]:text-slate-900">
                                {!! $qrcode !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>