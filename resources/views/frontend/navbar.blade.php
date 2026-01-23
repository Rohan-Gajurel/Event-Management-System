<nav class="sticky top-0 z-50 border-b border-slate-200/70 bg-white/80 backdrop-blur">
    <div class="container-page">
        <div class="flex h-16 items-center justify-between">
            <a href="{{ route('event_list') }}" class="group inline-flex items-center gap-2">
                <span class="grid h-9 w-9 place-items-center rounded-xl bg-indigo-600 text-white shadow-sm">E</span>
                <span class="text-lg font-extrabold tracking-tight text-slate-900 group-hover:text-indigo-700">
                    {{ config('app.name', 'EventMgmt') }}
                </span>
            </a>

            <div class="hidden items-center gap-2 md:flex">
                <a href="{{ route('event_list') }}" class="btn btn-soft">Home</a>
                <a href="{{ route('all_event_list') }}" class="btn btn-soft">Events</a>

                @auth
                    @if(in_array(Auth::user()->role, ['organizer', 'admin'], true))
                        <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                @endauth
            </div>

            <button
                type="button"
                class="md:hidden inline-flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-700 shadow-sm hover:bg-slate-50"
                x-data
                @click="$dispatch('toggle-mobile-nav')"
                aria-label="Open menu"
            >
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <div
            class="md:hidden pb-4"
            x-data="{ open: false }"
            @toggle-mobile-nav.window="open = !open"
            x-show="open"
            x-transition
        >
            <div class="mt-2 grid gap-2">
                <a href="{{ route('event_list') }}" class="btn btn-soft w-full justify-start">Home</a>
                <a href="{{ route('all_event_list') }}" class="btn btn-soft w-full justify-start">Events</a>

                @auth
                    @if(in_array(Auth::user()->role, ['organizer', 'admin'], true))
                        <a href="{{ route('dashboard') }}" class="btn btn-primary w-full justify-start">Dashboard</a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger w-full justify-start">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary w-full justify-start">Login</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
