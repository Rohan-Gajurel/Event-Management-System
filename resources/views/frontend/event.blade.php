@extends('frontend.layout')
@section("content")

    <section class="page-section">
        <div class="container-page">
            <div class="flex items-end justify-between gap-6">
                <div>
                    <h1 class="text-2xl font-extrabold tracking-tight text-slate-900 sm:text-3xl">All Events</h1>
                    <p class="mt-1 text-sm text-slate-600">Explore everything that’s happening.</p>
                </div>
                <a href="{{ route('event_list') }}" class="btn btn-soft hidden sm:inline-flex">Back home</a>
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

