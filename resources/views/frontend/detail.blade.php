<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Event Details</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
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
      @auth
      <form action="{{route('ticket.store', $event->id)}}" class="space-y-4" method="POST">
        @csrf
        <label class="block">
          <span class="text-gray-700">Number of Tickets</span>
          <input type="number" min="1" id="quantity" name="quantity" class="mt-1 block w-full rounded border-gray-300 shadow-sm">
        </label>
        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded">Book Now</button>
      </form>
      @else
      <p>
        Create Account to Buy Ticket <a href="{{ route('register') }}" class="px-6 py-2 bg-blue-600 text-white rounded">Register</a>
      </p>
      @endauth

      
      
    </div>
  </section>

</body>
</html>
