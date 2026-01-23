@extends('frontend.layout')
@section("content")
    <section class="page-section">
        <div class="container-page">
            @if (session('success'))
                <div class="alert alert-success mb-6" role="alert">
                    <span class="font-semibold">{{ session('success') }}</span>
                </div>
            @endif

            <div class="grid gap-8 lg:grid-cols-5">
                <div class="lg:col-span-3">
                    <div class="card overflow-hidden">
                        <div class="aspect-[16/9] w-full bg-slate-100">
                            <img
                                src="{{ asset('storage/'.$event->image) }}"
                                alt="{{ $event->name }}"
                                class="h-full w-full object-cover"
                                loading="lazy"
                            >
                        </div>
                        <div class="card-body">
                            <div class="flex flex-wrap items-start justify-between gap-4">
                                <div>
                                    <h1 class="text-2xl font-extrabold tracking-tight text-slate-900 sm:text-3xl">
                                        {{ $event->name }}
                                    </h1>
                                    <p class="mt-1 text-sm text-slate-600">
                                        {{ $event->venue->name }} • {{ $event->venue->address }}
                                    </p>
                                </div>

                                <div class="text-right">
                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Price</p>
                                    <p class="text-2xl font-extrabold text-slate-900">Rs. {{ $event->price }}</p>
                                </div>
                            </div>

                            <div class="mt-5 grid gap-3 sm:grid-cols-2">
                                <div class="rounded-2xl bg-slate-50 p-4 ring-1 ring-slate-200">
                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Category</p>
                                    <p class="mt-1 font-semibold text-slate-900">{{ $event->category->name }}</p>
                                </div>
                                <div class="rounded-2xl bg-slate-50 p-4 ring-1 ring-slate-200">
                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Date</p>
                                    <p class="mt-1 font-semibold text-slate-900">{{ $event->date }}</p>
                                </div>
                            </div>

                            <div class="mt-6">
                                <h2 class="text-sm font-extrabold tracking-tight text-slate-900">About this event</h2>
                                <p class="mt-2 whitespace-pre-line text-sm leading-6 text-slate-600">
                                    {{ $event->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="text-lg font-extrabold tracking-tight text-slate-900">Tickets</h2>
                            <p class="mt-1 text-sm text-slate-600">Reserve your spot before it sells out.</p>

                            <div class="mt-5 space-y-3">
                                @if($event->date < now())
                                    <div class="alert alert-warning" role="alert">
                                        <span class="font-semibold">This event has ended.</span>
                                        <div class="mt-1 text-sm">Total ticket sold: {{ $tickets_sold }}</div>
                                    </div>
                                    <button type="button" class="btn btn-soft w-full" disabled>Booking closed</button>
                                @else
                                    <a href="{{ route('ticket-form', $event->id) }}" class="btn btn-primary w-full">
                                        Buy tickets
                                    </a>
                                    <p class="text-xs text-slate-500">
                                        You’ll upload a payment voucher on the next step.
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection