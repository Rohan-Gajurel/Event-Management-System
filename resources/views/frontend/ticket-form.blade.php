@extends('frontend.layout')
@section("content")
<section class="container mx-auto py-12">
<h1>{{$event->name}}</h1>
<p>Price: {{$event->price}}</p>
<form action="{{route('ticket.store', $event->id)}}" class="space-y-4" method="POST">
        @csrf
        <span class="text-gray-700">Number of Tickets</span>
        <div class="inline-flex items-center border border-gray-300 rounded-lg overflow-hidden">
    <button
        type="button"
        class="px-3 py-2 text-gray-600 hover:bg-gray-100 focus:outline-none"
        onclick="const qty = document.getElementById('quantity');
            if (parseInt(qty.value) > 1) {
                qty.value = parseInt(qty.value) - 1;}
                document.getElementById('total_price').innerText =
                        {{ $event->price }} * qty.value;

                " 
    >
    -
    </button>

    <input
        id="quantity"
        name="quantity"
        type="number"
        value="1"
        class="w-12 text-center border-l border-r border-gray-300 focus:outline-none"
    />

    <button
        type="button"
        class="px-3 py-2 text-gray-600 hover:bg-gray-100 focus:outline-none"
        onclick="const qty = document.getElementById('quantity');
                qty.value = parseInt(qty.value) + 1;
                document.getElementById('total_price').innerText =
                        {{ $event->price }} * qty.value;

                "
    >
        +
    </button>
</div>
    <p>Total Amount: <span id="total_price">{{$event->price}}</span>
    </p>
    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded">Book Now</button>
</form>
<section>

@endsection