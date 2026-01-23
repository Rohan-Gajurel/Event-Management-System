@extends('admin.layout')
@section('content')

    <div class="card">
        <div class="card-body">
            <div class="flex flex-wrap items-end justify-between gap-4">
                <div>
                    <h2 class="text-xl font-extrabold tracking-tight text-slate-900">Venues</h2>
                    <p class="mt-1 text-sm text-slate-600">Manage where events take place.</p>
                </div>
                <a href="{{ route('venue.create') }}" class="btn btn-primary">Create venue</a>
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
                <table class="table min-w-[900px]">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Venue</th>
                            <th>Address</th>
                            @if(Auth::user()->role=="admin")
                                <th class="text-right">Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        @foreach ($venues as $venue)
                            <tr>
                                <td class="font-semibold text-slate-900">{{ $i }}</td>
                                <td class="font-semibold text-slate-900">{{ $venue->name }}</td>
                                <td class="text-slate-700">{{ $venue->address }}</td>
                                @if(Auth::user()->role=="admin")
                                    <td class="text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="{{ route('venue.edit', $venue->id) }}" class="btn btn-soft">Edit</a>
                                            <form action="{{ route('venue.delete', $venue->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this venue?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                            <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection