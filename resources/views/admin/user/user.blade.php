@extends('admin.layout')
@section('content')

    <div class="bg-white p-6 rounded-lg shadow">
      <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-semibold">All Users</h2>
      </div>
    @if(session('delete_message'))
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
            <th class="border p-2">Email</th>
            <th class="border p-2">Role</th>
            <th class="border p-2">Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php $i=1; ?> 
         @foreach ($users as $user )
          <tr>
            
            <td class="border p-2">{{$i}}</td>
            <td class="border p-2">{{$user->name}}</td>
            <td class="border p-2">{{$user->email}}</td>
            <td class="border p-2">{{$user->role}}</td>
            <td class="border p-2">
                <div class="flex gap-2">
                    <a href="{{ route('user.edit', $user->id) }}">
                        <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                            Edit
                        </button>
                    </a>

                    <form action="{{ route('user.delete', $user->id) }}" method="POST"  onsubmit="return confirm('Are you sure you want to delete this user?');">
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