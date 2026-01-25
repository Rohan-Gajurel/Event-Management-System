<nav class="sticky top-0 z-50 border-b border-slate-200/70 bg-white/80 backdrop-blur">
    <div class="container-page">
        <div class="flex h-16 items-center justify-between">
            {{-- Logo --}}
            <a href="{{ route('event_list') }}" class="group inline-flex items-center gap-2">
                <span class="grid h-9 w-9 place-items-center rounded-xl bg-indigo-600 text-white shadow-sm">E</span>
                <span class="text-lg font-extrabold tracking-tight text-slate-900 group-hover:text-indigo-700">
                    {{ config('app.name', 'EventMgmt') }}
                </span>
            </a>

            {{-- Desktop Links --}}
            <div class="hidden items-center gap-2 md:flex">
                <a href="{{ route('event_list') }}" class="btn btn-soft">Home</a>
                <a href="{{ route('all_event_list') }}" class="btn btn-soft">Events</a>

                @auth
                    {{-- Profile Dropdown --}}
                    <div x-data="{ open: false }" class="relative">
                        <button
                            @click="open = !open"
                            class="flex items-center gap-2 rounded-full border border-slate-200 p-1 hover:bg-slate-100"
                        >
                            <img
                                src="{{ Auth::user()->profile?->profile_image
                                    ? asset('storage/'.Auth::user()->profile->profile_image)
                                    : asset('default-avatar.png') }}"
                                alt="Profile"
                                class="w-8 h-8 rounded-full object-cover"
                            >
                            <span class="hidden md:inline">{{ Auth::user()->name }}</span>
                            <svg class="h-4 w-4 text-slate-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        {{-- Dropdown Menu --}}
                        <div
                            x-show="open"
                            @click.outside="open = false"
                            x-transition
                            class="absolute right-0 mt-2 w-48 bg-white border border-slate-200 rounded-xl shadow-lg py-2 z-50"
                        >
                            <a href="{{ route('user_profile') }}"
                               class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100">Profile</a>

                            @if(in_array(Auth::user()->role, ['organizer', 'admin'], true))
                                <a href="{{ route('dashboard') }}"
                                   class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100">Dashboard</a>
                            @endif

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                @endauth
            </div>

            {{-- Mobile menu button --}}
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

        {{-- Mobile Menu --}}
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
                        <a href="{{ route('dashboard') }}" class="btn btn-soft w-full justify-start">Dashboard</a>
                    @endif

                    <a href="{{ route('user_profile') }}" class="btn btn-soft w-full justify-start">Profile</a>

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
