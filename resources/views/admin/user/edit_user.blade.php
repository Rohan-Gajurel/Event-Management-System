@extends('admin.layout')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow mb-6">
      <h2 class="text-xl font-semibold mb-4">Edit User Role</h2>
      @if($errors->any())
            <div class="bg-red-100 text-sm text-red-700 rounded-md p-4 m-4" role="alert">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      <form action="{{route('user.update', $user->id)}}" class="grid grid-cols-1 md:grid-cols-2 gap-4" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
        <input type="text" placeholder="Name" class="p-3 border rounded" value={{ $user->name }} readonly>
        <select class="p-3 border rounded" name="role">
          <option selected disabled>Category</option>
            <option value="organizer" {{ $user->role=="organizer" ? 'selected':'' }}>Organizer </option>
            <option value="participant" {{ $user->role=="participant" ? 'selected':'' }}>Partcipant </option>
        </select>
        <button class="bg-blue-600 text-white py-3 rounded hover:bg-blue-700 transition col-span-full">Update Event</button>
      </form>
    </div>
@endsection