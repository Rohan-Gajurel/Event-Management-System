<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name', 'Event Management') }}</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
  <div class="min-h-screen flex flex-col">
    @include('frontend.navbar')

    <main class="flex-1">
      @yield('content')
    </main>

    @include('frontend.footer')
  </div>
</body>
</html>
