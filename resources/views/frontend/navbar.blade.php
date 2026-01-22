<nav class="bg-white shadow-md">
  <div class="max-w-7xl mx-auto px-4">
    <div class="flex justify-between items-center h-16">
      
      <!-- Logo -->
      <a href="{{ route('event_list') }}" class="font-bold text-2xl text-blue-600 hover:text-blue-700">
        EventMgmt
      </a>

      <!-- Menu Links -->
      <div class="flex items-center space-x-4">
        <a href="{{ route('event_list') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md">Home</a>
        <a href="{{ route('all_event_list') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md">Events</a>

        <!-- Authentication Links -->
        @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-600 text-white px-3 py-2 rounded-md hover:bg-red-700 transition duration-200">
              Logout
            </button>
          </form>
            @if(Auth::user()->role==="organizer"or"admin")
                <a href="{{ route('dashboard') }}" class="bg-blue-600 text-white px-3 py-2 rounded-md hover:bg-blue-700 transition duration-200">
            Dashboard
          </a>
            @endif
        @else
          <a href="{{ route('login') }}" class="bg-green-600 text-white px-3 py-2 rounded-md hover:bg-green-700 transition duration-200">
            Login
          </a>  
        @endauth
      </div>

    </div>
  </div>
</nav>
