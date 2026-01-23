@extends('admin.layout')

@section('content')
<div class="mx-auto max-w-3xl">
    <div class="card">
        <div class="card-body">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div>
                    <h2 class="text-xl font-extrabold tracking-tight text-slate-900">Edit venue</h2>
                    <p class="mt-1 text-sm text-slate-600">Update venue details.</p>
                </div>
                <a href="{{ route('venue.index') }}" class="btn btn-soft">Back</a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger mt-6" role="alert">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('venue.update', $venue->id) }}" method="POST" class="mt-6 grid grid-cols-1 gap-4 md:grid-cols-2">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-semibold text-slate-900">Venue name</label>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $venue->name) }}"
                        placeholder="Enter venue name"
                        class="mt-2 input"
                    >
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-900">Address</label>
                    <input
                        type="text"
                        name="address"
                        value="{{ old('address', $venue->address) }}"
                        placeholder="Enter venue address"
                        class="mt-2 input"
                    >
                </div>

                <div class="md:col-span-2 flex items-center justify-end gap-3 pt-2">
                    <button type="submit" class="btn btn-primary">Update venue</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
