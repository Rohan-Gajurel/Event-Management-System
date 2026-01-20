    <div class="flex items-center justify-between mb-6">
      <h1 class="text-2xl font-bold">Events Management</h1>

      <div class="flex items-center space-x-4">
        @auth
          <span class="text-gray-700">Hello, {{ Auth::user()->name }}</span>
          <a href="{{ route('event_list') }}" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">Website</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Logout</button>
          </form>
        @else
          <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600">Login</a>
          <a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-600">Register</a>
        @endauth
      </div>
    </div>