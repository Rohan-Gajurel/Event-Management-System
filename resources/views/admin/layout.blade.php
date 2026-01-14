<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
<div class="flex min-h-screen bg-gray-100">
  <!-- Sidebar -->
  @include('admin.sidebar')
  <!-- Main Content -->
  <main class="flex-1 p-6">
    @include('admin.navbar')
    @yield('content')
  </main>
</div>
</body>
</html>