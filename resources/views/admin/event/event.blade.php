@extends('admin.layout')
@section('content')

    <div class="bg-white p-6 rounded-lg shadow">
      <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-semibold">All Event</h2>
        <a href="{{ route('event.create') }}" ><button type="submit" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-800">Create</button></a>
      </div>
       @if (session('success'))
    <div class="bg-green-400 text-sm text-white rounded-md p-4" role="alert">
        <span class="font-bold">{{ session('success')}}</span> 
    </div>
    @elseif(session('delete_message'))
    <div class="bg-red-400 text-sm text-white rounded-md p-4" role="alert">
        <span class="font-bold">{{ session('delete_message')}}</span>
    </div>
    @elseif(session('update_message'))
    <div class="bg-yellow-400 text-sm text-white rounded-md p-4" role="alert">
        <span class="font-bold">{{ session('update_message')}}</span>
    </div>
    @endif
      <table class="w-full text-left border-collapse">
        <thead>
          <tr>
            <th class="border p-2">SN</th>
            <th class="border p-2">Name</th>
            <th class="border p-2">Description</th>
            <th class="border p-2">Date</th>
            <th class="border p-2">Venue</th>
            <th class="border p-2">Category</th>
            <th class="border p-2">Image</th>
            <th class="border p-2">Price</th>
            <th class="border p-2">Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php $i=1; ?> 
         @foreach ($events as $event )
          <tr>
            
            <td class="border p-2">{{$i}}</td>
            <td class="border p-2">{{$event->name}}</td>
            <td class="border p-2">{{$event->description }}</td>
            <td class="border p-2">{{$event->date}}</td>
            <td class="border p-2">{{$event->venue->name}}</td>
            <td class="border p-2">{{$event->category->name}}</td>
            <td class="border p-2"><img src={{asset('storage/'.$event->image)  }} alt="Image not found" width="150">
            </td>
            <td class="border p-2">{{$event->price}}</td>

            <td class="border p-2">
                <div class="flex gap-2">
                    <a href="{{ route('event.edit', $event->id) }}">
                        <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                            Edit
                        </button>
                    </a>

                    <form action="{{ route('event.delete', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"  
                            class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                            Delete
                        </button>
                    </form>
                </div>
            </td>
           
          </tr>
           <?php $i++ ?>
          @endforeach
        </tbody>
      </table>
    </div>
@endsection