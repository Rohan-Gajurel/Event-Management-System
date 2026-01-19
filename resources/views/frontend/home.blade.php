<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Event Management</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

  <!-- Navbar -->
  <nav class="bg-white shadow-md p-4 flex justify-between">
    <a href="#" class="font-bold text-xl">EventMgmt</a>
    <div>
      <a href="#" class="px-4 py-2 text-gray-700 hover:text-blue-600">Home</a>
      <a href="#" class="px-4 py-2 text-gray-700 hover:text-blue-600">Events</a>

      @auth
      <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Logout</button>
      </form>
      @else
      <a href={{ route('login') }} class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">Login</a>
              
      @endauth
      

    </div>
  </nav>

  <!-- Hero Section -->
  <section class="text-center py-12 bg-blue-50">
    <h1 class="text-4xl font-bold mb-4">Discover Amazing Events</h1>
    <p class="text-gray-700 mb-6">Find events by category, venue, and organizers</p>
    <a href="#events" class="px-6 py-2 bg-blue-600 text-white rounded">Browse Events</a>
  </section>

  <!-- Event Listing -->
  <section id="events" class="py-12 container mx-auto">
    <h2 class="text-3xl font-bold mb-6">Upcoming Events</h2>
    <div class="grid md:grid-cols-3 gap-6">
      
      <!-- Event Card Example -->
      @foreach ($events as $event )
      <div class="bg-white rounded shadow p-4">
        <img src="{{ asset('storage/'.$event->image) }}" alt="" height="100" width="300">
        <h3 class="text-xl font-bold mb-2">{{$event->name}}</h3>
        <p class="text-gray-600 mb-2">Venue: {{$event->venue->name}}</p>
        <p class="text-gray-600 mb-2">Category: {{$event->category->name}}</p>
        <p class="text-gray-800 font-semibold mb-2">${{$event->price}}</p>
        <a href="{{ route('event.detail',$event->id )}}" class="block mt-2 px-4 py-2 bg-blue-600 text-white rounded text-center">View Details</a>
      </div>   
      @endforeach
      
    
      <!-- Repeat cards dynamically from backend -->
      
    </div>
  </section>

</body>
</html>
