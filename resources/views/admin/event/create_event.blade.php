@extends('admin.layout')

@section('content')
    <div class="mx-auto max-w-5xl">
        <div class="card">
            <div class="card-body">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <div>
                        <h2 class="text-xl font-extrabold tracking-tight text-slate-900">Create event</h2>
                        <p class="mt-1 text-sm text-slate-600">Add a new event listing.</p>
                    </div>
                    <a href="{{ route('event.index') }}" class="btn btn-soft">Back</a>
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

                <form action="{{ route('event.store') }}" class="mt-6 grid grid-cols-1 gap-4 md:grid-cols-2" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <label class="block text-sm font-semibold text-slate-900">Event name</label>
                        <input type="text" name="event_name" placeholder="Event name" class="mt-2 input" value="{{ old('event_name') }}">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-900">Date & time</label>
                        <input type="datetime-local" class="mt-2 input" name="date" value="{{ old('date') }}">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-slate-900">Description</label>
                        <input type="text" name="description" placeholder="Short description" class="mt-2 input" value="{{ old('description') }}">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-900">Category</label>
                        <select class="mt-2 select" name="category">
                            <option selected disabled>Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-900">Venue</label>
                        <select class="mt-2 select" name="venue">
                            <option selected disabled>Venue</option>
                            @foreach ($venues as $venue)
                                <option value="{{ $venue->id }}">{{ $venue->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    @if(auth()->user()->role === "admin")
                        <div>
                            <label class="block text-sm font-semibold text-slate-900">Status</label>
                            <select class="mt-2 select" name="status">
                                <option selected disabled>Status</option>
                                <option value="published">Published</option>
                                <option value="unpublished">Unpublished</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-900">Organizer</label>
                            <select class="mt-2 select" name="user_id" required>
                                <option disabled selected>Select User</option>
                                @foreach ($organizers as $organizer)
                                    <option value="{{ $organizer->id }}">{{ $organizer->user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif

                    @if(auth()->user()->role === 'organizer')
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-slate-900">Organizer</label>
                            <input type="text" value="{{ auth()->user()->name }}" class="mt-2 input" readonly>
                            <input type="hidden" name="organizer_id" value="{{ auth()->user()->organizer->id }}">
                        </div>
                    @endif

                    <div>
                        <label class="block text-sm font-semibold text-slate-900">Price</label>
                        <input type="number" placeholder="Price" class="mt-2 input" name="price" value="{{ old('price') }}">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-900">Image</label>
                        <input type="file" class="mt-2 input" name="image">
                    </div>

                    <div class="md:col-span-2 flex items-center justify-end gap-3 pt-2">
                        <button type="submit" class="btn btn-primary">Create event</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection