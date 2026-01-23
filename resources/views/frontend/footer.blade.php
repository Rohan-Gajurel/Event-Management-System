<footer class="mt-16 border-t border-slate-200/70 bg-white">
    <div class="container-page py-10">
        <div class="flex flex-col gap-8 md:flex-row md:items-center md:justify-between">
            <div>
                <div class="flex items-center gap-2">
                    <span class="grid h-9 w-9 place-items-center rounded-xl bg-indigo-600 text-white shadow-sm">E</span>
                    <span class="text-base font-extrabold tracking-tight text-slate-900">{{ config('app.name', 'EventMgmt') }}</span>
                </div>
                <p class="mt-2 text-sm text-slate-600">
                    Discover, book, and manage events with ease.
                </p>
            </div>

            <div class="grid gap-3 text-sm text-slate-600 sm:grid-cols-3 sm:gap-8">
                <a href="{{ route('event_list') }}" class="font-semibold text-slate-700 hover:text-indigo-700">Home</a>
                <a href="{{ route('all_event_list') }}" class="font-semibold text-slate-700 hover:text-indigo-700">Events</a>
                @auth
                    @if(in_array(Auth::user()->role, ['organizer', 'admin'], true))
                        <a href="{{ route('dashboard') }}" class="font-semibold text-slate-700 hover:text-indigo-700">Dashboard</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-slate-700 hover:text-indigo-700">Login</a>
                @endauth
            </div>
        </div>

        <div class="mt-8 flex flex-col gap-3 border-t border-slate-200/70 pt-6 sm:flex-row sm:items-center sm:justify-between">
            <p class="text-xs text-slate-500">
                © {{ now()->year }} {{ config('app.name', 'EventMgmt') }}. All rights reserved.
            </p>
            <p class="text-xs text-slate-500">
                Built with Laravel & Tailwind.
            </p>
        </div>
    </div>
</footer>

