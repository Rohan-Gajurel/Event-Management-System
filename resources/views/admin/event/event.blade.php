@extends('admin.layout')
@section('content')

    <div class="card">
        <div class="card-body">
            <div class="flex flex-wrap items-end justify-between gap-4">
                <div>
                    <h2 class="text-xl font-extrabold tracking-tight text-slate-900">Events</h2>
                    <p class="mt-1 text-sm text-slate-600">Create, edit, and manage event listings.</p>
                </div>
                <a href="{{ route('event.create') }}" class="btn btn-primary">Create event</a>
            </div>

            <div class="mt-6 space-y-3">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <span class="font-semibold">{{ session('success') }}</span>
                    </div>
                @elseif(session('delete_message'))
                    <div class="alert alert-danger" role="alert">
                        <span class="font-semibold">{{ session('delete_message') }}</span>
                    </div>
                @elseif(session('update_message'))
                    <div class="alert alert-warning" role="alert">
                        <span class="font-semibold">{{ session('update_message') }}</span>
                    </div>
                @endif
            </div>

            <div class="mt-6 overflow-x-auto">
                <table class="table min-w-[1100px]">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Organizer</th>
                            <th>Date</th>
                            <th>Venue</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        @foreach ($events as $event)
                            <tr>
                                <td class="font-semibold text-slate-900">{{ $i }}</td>
                                <td class="font-semibold text-slate-900">{{ $event->name }}</td>
                                <td>
                                    @php
                                        $status = strtolower((string) $event->status);
                                    @endphp
                                    @if(in_array($status, ['active', 'published'], true))
                                        <span class="badge badge-success">{{ $event->status }}</span>
                                    @elseif(in_array($status, ['pending', 'draft'], true))
                                        <span class="badge badge-warning">{{ $event->status }}</span>
                                    @elseif(in_array($status, ['unpublished', 'inactive'], true))
                                        <span class="badge badge-neutral">{{ $event->status }}</span>
                                    @else
                                        <span class="badge badge-info">{{ $event->status }}</span>
                                    @endif
                                </td>
                                <td>{{ $event->profile->user->name }}</td>
                                <td>{{ $event->date }}</td>
                                <td>{{ $event->venue->name }}</td>
                                <td>{{ $event->category->name }}</td>
                                <td>
                                    <img
                                        src="{{ asset('storage/'.$event->image) }}"
                                        alt="{{ $event->name }}"
                                        class="h-12 w-20 rounded-lg object-cover ring-1 ring-slate-200"
                                        loading="lazy"
                                    >
                                </td>
                                <td>Rs. {{ $event->price }}</td>
                                <td class="text-right">
                                    <div class="inline-flex items-center gap-2">
                                        <a href="{{ route('event.edit', $event->id) }}" class="btn btn-soft">Edit</a>
                                        <form action="{{ route('event.delete', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection