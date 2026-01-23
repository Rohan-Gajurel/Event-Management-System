<aside class="sticky top-0 hidden h-screen w-72 shrink-0 border-r border-slate-200/70 bg-white lg:block">
    <div class="p-6">
        <div class="flex items-center gap-3">
            <div class="grid h-10 w-10 place-items-center rounded-xl bg-indigo-600 text-white shadow-sm">A</div>
            <div>
                <div class="text-sm font-semibold text-slate-500">Admin</div>
                <div class="text-lg font-extrabold tracking-tight text-slate-900">Dashboard</div>
            </div>
        </div>

        <nav class="mt-8 space-y-2">
            @if(Auth::user()->role == "admin")
                <a href="{{ route('user.index') }}" class="btn btn-soft w-full justify-start">Users</a>
                <a href="{{ route('organizer.index') }}" class="btn btn-soft w-full justify-start">Organizers</a>
            @endif
            <a href="{{ route('event.index') }}" class="btn btn-soft w-full justify-start">Events</a>
            <a href="{{ route('category.index') }}" class="btn btn-soft w-full justify-start">Categories</a>
            <a href="{{ route('venue.index') }}" class="btn btn-soft w-full justify-start">Venues</a>
            <a href="{{ route('ticket.index') }}" class="btn btn-soft w-full justify-start">Tickets</a>
        </nav>
    </div>
</aside>