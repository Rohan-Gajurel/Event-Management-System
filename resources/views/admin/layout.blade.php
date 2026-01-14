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

    <!-- Add Event Form -->
    <div class="bg-white p-6 rounded-lg shadow mb-6">
      <h2 class="text-xl font-semibold mb-4">Add New Event</h2>
      <form class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <input type="text" placeholder="Event Name" class="p-3 border rounded">
        <input type="text" placeholder="Description" class="p-3 border rounded">
        <input type="datetime-local" class="p-3 border rounded">
        <select class="p-3 border rounded">
          <option>Category</option>
        </select>
        <select class="p-3 border rounded">
          <option>Venue</option>
        </select>
        <input type="number" placeholder="Price" class="p-3 border rounded">
        <button class="bg-blue-600 text-white py-3 rounded hover:bg-blue-700 transition col-span-full">Add Event</button>
      </form>
    </div>

    <!-- Events Table -->
    <div class="bg-white p-6 rounded-lg shadow">
      <h2 class="text-xl font-semibold mb-4">All Events</h2>
      <table class="w-full text-left border-collapse">
        <thead>
          <tr>
            <th class="border p-2">Name</th>
            <th class="border p-2">Category</th>
            <th class="border p-2">Venue</th>
            <th class="border p-2">Date</th>
            <th class="border p-2">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="border p-2">Tech Conference 2026</td>
            <td class="border p-2">Technology</td>
            <td class="border p-2">San Francisco Hall</td>
            <td class="border p-2">2026-02-14</td>
            <td class="border p-2">
              <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</button>
              <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
</div>
</body>
</html>