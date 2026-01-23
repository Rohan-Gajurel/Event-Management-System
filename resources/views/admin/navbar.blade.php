<div class="flex flex-wrap items-center justify-between gap-4">
    <div>
        <h1 class="text-xl font-extrabold tracking-tight text-slate-900 sm:text-2xl">Admin</h1>
        <p class="text-sm text-slate-600">Manage events, venues, categories and tickets.</p>
    </div>

    <div class="flex items-center gap-3">
        @auth
            <span class="hidden text-sm font-semibold text-slate-700 sm:inline">Hi, {{ Auth::user()->name }}</span>
            <a href="{{ route('event_list') }}" class="btn btn-soft">Website</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="btn btn-soft">Login</a>
            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
        @endauth
    </div>
</div>