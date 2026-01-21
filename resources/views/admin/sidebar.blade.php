  <aside class="w-64 bg-white shadow p-6">
    <h2 class="text-xl font-bold mb-6">Admin Panel</h2>
    <nav class="space-y-3">
      @if(Auth::user()->role=="admin")
      <a href="{{ route('user.index') }}" class="block text-gray-700 hover:text-blue-600">User</a>
      <a href="{{ route('organizer.index') }}" class="block text-gray-700 hover:text-blue-600">Organizer</a>
      @endif
      <a href="{{ route('event.index') }}" class="block text-gray-700 hover:text-blue-600">Events</a>
      <a href="{{ route('category.index') }}" class="block text-gray-700 hover:text-blue-600">Categories</a>
      <a href="{{ route('venue.index') }}" class="block text-gray-700 hover:text-blue-600">Venues</a>
      <a href="{{ route('ticket.index') }}" class="block text-gray-700 hover:text-blue-600">Tickets</a>
    </nav>
  </aside>