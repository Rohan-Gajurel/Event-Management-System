@extends('admin.layout')

@section('content')
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
@endsection