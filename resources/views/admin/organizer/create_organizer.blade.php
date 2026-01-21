@extends('admin.layout')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow mb-6">
      <h2 class="text-xl font-semibold mb-4">Add Organizer</h2>
      @if($errors->any())
            <div class="bg-red-100 text-sm text-red-700 rounded-md p-4 m-4" role="alert">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      <form action="{{route('organizer.store')}}" class="grid grid-cols-1 md:grid-cols-2 gap-4" method="POST" enctype="multipart/form-data">
      @csrf
        <select class="p-3 border rounded" name="user_id">
          <option selected disabled>Name</option>
          @foreach ($users as $user)
          <option value={{ $user->id }}>{{ $user->name }}
          @endforeach
        </select>
        <select class="p-3 border rounded" name="type">
          <option selected disabled>Type</option>
            <option value="individual">Individual </option>
            <option value="company">Company </option>
        </select>
        <input type="text" placeholder="Address" class="p-3 border rounded" name="address">
        <button class="bg-blue-600 text-white py-3 rounded hover:bg-blue-700 transition col-span-full">Add Event</button>
      </form>
    </div>
@endsection