@extends('admin.layout')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow mb-6">
      <h2 class="text-xl font-semibold mb-4">Edit Organizer</h2>
      @if($errors->any())
            <div class="bg-red-100 text-sm text-red-700 rounded-md p-4 m-4" role="alert">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      <form action="{{route('organizer.update',$organizer->id)}}" class="grid grid-cols-1 md:grid-cols-2 gap-4" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
        <input type="text" value="{{ $organizer->user->name }}" class="p-3 border rounded"readonly>

        <input type="hidden" name="user_id" value="{{ $organizer->user_id }}">

        <select class="p-3 border rounded" name="type">
          <option selected disabled>Type</option>
            <option value="individual" {{ $organizer->type=='individual'?'selected':'' }}>Individual </option>
            <option value="company" {{ $organizer->type=='company'?'selected':'' }}>Company </option>
        </select>
        <input type="text" placeholder="Address" class="p-3 border rounded" name="address"  value="{{ $organizer->address }}">
        <button class="bg-blue-600 text-white py-3 rounded hover:bg-blue-700 transition col-span-full">Add Event</button>
      </form>
    </div>
@endsection