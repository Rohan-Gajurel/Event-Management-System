@extends('frontend.layout')
@section("content")
<section class="page-section">
    <div class="container-page">
        <div class="mx-auto max-w-2xl">
            <div class="mb-6">
                <a href="{{ route('event.detail', $event->id) }}" class="btn btn-soft">Back</a>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="flex flex-wrap items-start justify-between gap-4">
                        <div>
                            <h1 class="text-2xl font-extrabold tracking-tight text-slate-900">{{ $event->name }}</h1>
                            <p class="mt-1 text-sm text-slate-600">Ticket booking</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Price</p>
                            <p class="text-xl font-extrabold text-slate-900">Rs. {{ $event->price }}</p>
                        </div>
                    </div>

                    @if($errors->any())
                        <div class="alert alert-danger mt-6" role="alert">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('ticket.store', $event->id) }}" class="mt-6 space-y-5" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label class="block text-sm font-semibold text-slate-900">Number of tickets</label>
                            <div class="mt-2 inline-flex items-center overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
                                <button
                                    type="button"
                                    class="px-4 py-2 text-slate-700 hover:bg-slate-50"
                                    onclick="const qty = document.getElementById('quantity'); if (parseInt(qty.value) > 1) { qty.value = parseInt(qty.value) - 1; } document.getElementById('total_price').innerText = {{ $event->price }} * qty.value;"
                                    aria-label="Decrease quantity"
                                >
                                    -
                                </button>

                                <input
                                    id="quantity"
                                    name="quantity"
                                    type="number"
                                    min="1"
                                    value="1"
                                    class="w-16 border-x border-slate-200 text-center text-sm font-semibold text-slate-900 focus:outline-none"
                                    oninput="const qty = document.getElementById('quantity'); document.getElementById('total_price').innerText = {{ $event->price }} * qty.value;"
                                />

                                <button
                                    type="button"
                                    class="px-4 py-2 text-slate-700 hover:bg-slate-50"
                                    onclick="const qty = document.getElementById('quantity'); qty.value = parseInt(qty.value) + 1; document.getElementById('total_price').innerText = {{ $event->price }} * qty.value;"
                                    aria-label="Increase quantity"
                                >
                                    +
                                </button>
                            </div>

                            <p class="mt-3 text-sm text-slate-600">
                                Total amount:
                                <span class="font-extrabold text-slate-900">Rs. <span id="total_price">{{ $event->price }}</span></span>
                            </p>
                        </div>

                        <div>
                            <label for="image" class="block text-sm font-semibold text-slate-900">Payment voucher</label>
                            <p class="mt-1 text-xs text-slate-500">Upload a clear screenshot/photo of your payment.</p>
                            <input id="image" name="image" type="file" class="mt-2 input" />
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="btn btn-primary w-full">Book now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection