@extends('admin.layout')
@section('content')

    <div class="bg-white p-6 rounded-lg shadow">
      <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-semibold">All Venues</h2>
        <a href="{{ route('venue.create') }}" ><button type="submit" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-800">Create</button></a>
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
            <th class="border p-2">Category</th>
            <th class="border p-2">Address</th>
            @if(Auth::user()->role=="admin")
            <th class="border p-2">Actions</th>
            @endif
          </tr>
        </thead>
        <tbody>
        <?php $i=1; ?> 
         @foreach ($venues as $venue )
          <tr>
            
            <td class="border p-2">{{$i}}</td>
            <td class="border p-2">{{$venue->name}}</td>
            <td class="border p-2">{{$venue->address}}</td>
            @if(Auth::user()->role=="admin")
            <td class="border p-2">
                <div class="flex gap-2">
                    <a href="{{ route('venue.edit', $venue->id) }}">
                        <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                            Edit
                        </button>
                    </a>

                    <form action="{{ route('venue.delete', $venue->id) }}" method="POST"  onsubmit="return confirm('Are you sure you want to delete this venue?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                            class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                            Delete
                        </button>
                    </form>
                </div>
            </td>
            @endif
           
          </tr>
           <?php $i++ ?>
          @endforeach
        </tbody>
      </table>
    </div>
@endsection