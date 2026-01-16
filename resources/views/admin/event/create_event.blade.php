@extends('admin.layout')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow mb-6">
      <h2 class="text-xl font-semibold mb-4">Add New Event</h2>
      @if($errors->any())
            <div class="bg-red-100 text-sm text-red-700 rounded-md p-4 m-4" role="alert">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      <form action="{{route('event.store')}}" class="grid grid-cols-1 md:grid-cols-2 gap-4" method="POST" enctype="multipart/form-data">
      @csrf
        <input type="text" name="event_name" placeholder="Event Name" class="p-3 border rounded">
        <input type="text" name="description" placeholder="Description" class="p-3 border rounded">
        <input type="datetime-local" class="p-3 border rounded" name="date">
        <select class="p-3 border rounded" name="category">
          <option>Category</option>
          @foreach ($categories as $category)
          <option value={{ $category->id }}>{{ $category->name }}
          @endforeach
        </select>
        <select class="p-3 border rounded" name="venue">
          <option selected disabled>Venue</option>
          @foreach ($venues as $venue)
          <option value={{ $venue->id }}>{{ $venue->name }}
          @endforeach
        </select>
        <input type="number" placeholder="Price" class="p-3 border rounded" name="price">
        <input type="file" placeholder="Image" class="p-3 border rounded" name="image">
        <button class="bg-blue-600 text-white py-3 rounded hover:bg-blue-700 transition col-span-full">Add Event</button>
      </form>
    </div>
@endsection