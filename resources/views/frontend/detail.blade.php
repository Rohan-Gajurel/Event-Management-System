@extends('frontend.layout')
@section("content")
  @if (session('success'))
    <div class="bg-green-400 text-sm text-white rounded-md p-4" role="alert">
        <span class="font-bold">{{ session('success')}}</span> 
    </div>
  @endif

  <!-- Event Details Section -->
  <section class="container mx-auto py-12">
    <div class="bg-white shadow-md rounded p-6">
      <h1 class="text-3xl font-bold mb-2">{{$event->name}}</h1>
      <p class="text-gray-700 mb-4">Category: {{$event->category->name}}</p>
      <p class="text-gray-700 mb-4">Venue: {{$event->venue->name}}</p>
      <p class="text-gray-700 mb-4">Price: {{$event->price}}</p>
      <p class="text-gray-700 mb-4">Date: {{$event->date}}</p>
      <p class="text-gray-600 mb-6">Description: {{$event->description}}</p>

      <!-- Ticket Booking Form -->
      @if($event->date < now())
          <p>Total Ticket Sold: {{$tickets_sold}}</p>
      @endif
      
      
    </div>
  </section>

@endsection