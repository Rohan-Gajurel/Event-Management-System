@extends('frontend.layout')
@section("content")

  <!-- Event Listing -->
  <section id="events" class="py-12 container mx-auto">
    <h2 class="text-3xl font-bold mb-6">All Events</h2>
    <div class="grid md:grid-cols-3 gap-6">
      
      <!-- Event Card Example -->
      @foreach ($events as $event )
      <div class="bg-white rounded shadow p-4">
        <img src="{{ asset('storage/'.$event->image) }}" alt="" class="w-[300px] h-[300px] object-cover rounded-md">
        <h3 class="text-xl font-bold mb-2">{{$event->name}}</h3>
        <p class="text-gray-600 mb-2">Venue: {{$event->venue->name}}</p>
        <p class="text-gray-600 mb-2">Category: {{$event->category->name}}</p>
        <p class="text-gray-800 font-semibold mb-2">${{$event->price}}</p>
        <a href="{{ route('event.detail',$event->id )}}" class="inline mt-2 px-4 py-2 w-100 bg-blue-600 text-white rounded text-center">View Details</a>
        @if( $event->date<now() )
        <a href="" class="inline mt-2 px-4 py-2 w-100 bg-yellow-400 text-white rounded text-center">Sold Out</a>
        @else
        <a href="{{ route('ticket-form', $event->id ) }}" class="inline mt-2 px-4 py-2 w-100 bg-green-600 text-white rounded text-center">Buy Now</a>
        @endif
      </div>   
      @endforeach
      
    
      <!-- Repeat cards dynamically from backend -->
      
    </div>
  </section>

@endsection

