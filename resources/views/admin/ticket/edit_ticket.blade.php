@extends('admin.layout')

@section('content')
    <div class="mx-auto max-w-4xl">
        <div class="card">
            <div class="card-body">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <div>
                        <h2 class="text-xl font-extrabold tracking-tight text-slate-900">Edit ticket</h2>
                        <p class="mt-1 text-sm text-slate-600">Update ticket quantity and status.</p>
                    </div>
                    <a href="{{ route('ticket.index') }}" class="btn btn-soft">Back</a>
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

                <form action="{{ route('ticket.update', $ticket->id) }}" class="mt-6 grid grid-cols-1 gap-4 md:grid-cols-2" method="POST">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-semibold text-slate-900">User</label>
                        <input type="text" class="mt-2 input" value="{{ $ticket->user->name }}" readonly>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-900">Event</label>
                        <input type="text" class="mt-2 input" value="{{ $ticket->event->name }}" readonly>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-900">Quantity</label>
                        <input type="number" name="quantity" placeholder="Quantity" class="mt-2 input" value="{{ old('quantity', $ticket->quantity) }}">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-900">Status</label>
                        <select class="mt-2 select" name="status">
                            <option selected disabled>Status</option>
                            <option value="hold" {{ $ticket->status=='hold'?'selected':'' }}>Hold</option>
                            <option value="released" {{ $ticket->status=='released'?'selected':'' }}>Released</option>
                        </select>
                    </div>

                    <div class="md:col-span-2 flex items-center justify-end gap-3 pt-2">
                        <button type="submit" class="btn btn-primary">Update ticket</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection