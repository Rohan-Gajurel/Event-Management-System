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
      <form action="{{route('ticket.update', $ticket->id)}}" class="grid grid-cols-1 md:grid-cols-2 gap-4" method="POST">
        @csrf
        @method('PUT')
        <input type="text"   class="p-3 border rounded" value={{ $ticket->user->name }} readonly>
        <input type="text"  class="p-3 border rounded" value={{ $ticket->event->name }} redonly>
        <input type="text" name="quantity" placeholder="Quantity" class="p-3 border rounded" value={{ $ticket->quantity }}>
        <button type="submit" class="bg-blue-600 text-white py-3 rounded hover:bg-blue-700 transition " >Edit quantity</button>
      </form>
    </div>
@endsection