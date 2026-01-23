@extends('frontend.layout')
@section("content")
    <!-- Hero -->
    <section class="border-b border-slate-200/70 bg-gradient-to-b from-indigo-50 to-white">
        <div class="container-page page-section">
            <div class="grid items-center gap-10 lg:grid-cols-2">
                <div>
                    <p class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-1 text-sm font-semibold text-slate-700 ring-1 ring-slate-200">
                        Discover • Book • Attend
                    </p>
                    <h1 class="mt-4 text-4xl font-extrabold tracking-tight text-slate-900 sm:text-5xl">
                        Discover amazing events near you
                    </h1>
                    <p class="mt-4 text-base text-slate-600">
                        Browse by category and venue, then book tickets in seconds.
                    </p>

                    <div class="mt-6 flex flex-wrap gap-3">
                        <a href="{{ route('all_event_list') }}" class="btn btn-primary">Browse Events</a>
                        <a href="#events" class="btn btn-soft">See Upcoming</a>
                    </div>
                </div>

                <div class="card card-hover">
                    <div class="card-body">
                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="rounded-2xl bg-slate-50 p-4 ring-1 ring-slate-200">
                                <p class="text-sm font-semibold text-slate-900">Fast checkout</p>
                                <p class="mt-1 text-sm text-slate-600">Upload voucher, done.</p>
                            </div>
                            <div class="rounded-2xl bg-slate-50 p-4 ring-1 ring-slate-200">
                                <p class="text-sm font-semibold text-slate-900">Secure entry</p>
                                <p class="mt-1 text-sm text-slate-600">QR validation.</p>
                            </div>
                            <div class="rounded-2xl bg-slate-50 p-4 ring-1 ring-slate-200">
                                <p class="text-sm font-semibold text-slate-900">Curated venues</p>
                                <p class="mt-1 text-sm text-slate-600">Find events easily.</p>
                            </div>
                            <div class="rounded-2xl bg-slate-50 p-4 ring-1 ring-slate-200">
                                <p class="text-sm font-semibold text-slate-900">Organizer tools</p>
                                <p class="mt-1 text-sm text-slate-600">Manage tickets.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Upcoming -->
    <section id="events" class="page-section">
        <div class="container-page">
            <div class="flex items-end justify-between gap-6">
                <div>
                    <h2 class="text-2xl font-extrabold tracking-tight text-slate-900 sm:text-3xl">Upcoming Events</h2>
                    <p class="mt-1 text-sm text-slate-600">Handpicked events you might like.</p>
                </div>
                <a href="{{ route('all_event_list') }}" class="btn btn-soft hidden sm:inline-flex">View all</a>
            </div>

            <div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($events as $event)
                    <div class="card card-hover overflow-hidden">
                        <div class="aspect-[4/3] w-full bg-slate-100">
                            <img
                                src="{{ asset('storage/'.$event->image) }}"
                                alt="{{ $event->name }}"
                                class="h-full w-full object-cover"
                                loading="lazy"
                            >
                        </div>

                        <div class="card-body">
                            <div class="flex items-start justify-between gap-3">
                                <h3 class="text-lg font-bold leading-snug text-slate-900">{{ $event->name }}</h3>
                                @if($event->date < now())
                                    <span class="badge badge-warning">Ended</span>
                                @else
                                    <span class="badge badge-success">Upcoming</span>
                                @endif
                            </div>

                            <div class="mt-2 space-y-1 text-sm text-slate-600">
                                <p><span class="font-semibold text-slate-800">Venue:</span> {{ $event->venue->name }}</p>
                                <p><span class="font-semibold text-slate-800">Category:</span> {{ $event->category->name }}</p>
                            </div>

                            <div class="mt-4 flex items-center justify-between">
                                <p class="text-base font-extrabold text-slate-900">Rs. {{ $event->price }}</p>
                                <a href="{{ route('event.detail', $event->id) }}" class="btn btn-soft">Details</a>
                            </div>

                            <div class="mt-3">
                                @if($event->date < now())
                                    <button type="button" class="btn btn-soft w-full" disabled>Sold Out</button>
                                @else
                                    <a href="{{ route('ticket-form', $event->id) }}" class="btn btn-primary w-full">Buy Now</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection