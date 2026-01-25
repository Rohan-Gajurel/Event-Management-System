@extends('admin.layout')
@section('content')

    <div class="card">
        <div class="card-body">
            <div class="flex flex-wrap items-end justify-between gap-4">
                <div>
                    <h2 class="text-xl font-extrabold tracking-tight text-slate-900">Organizers</h2>
                    <p class="mt-1 text-sm text-slate-600">Manage organizer profiles.</p>
                </div>
                {{-- <a href="{{ route('organizer.create') }}" class="btn btn-primary">Create organizer</a> --}}
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

            <div class="mt-6">
                <table class="table w-full table-fixed">
                    <thead>
                        <tr>
                            <th class="w-16">SN</th>
                            <th>Name</th>
                            <th class="w-32">Type</th>
                            <th class="hidden lg:table-cell">Address</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        @foreach ($organizers as $organizer)
                            <tr>
                                <td class="font-semibold text-slate-900">{{ $i }}</td>
                                <td class="font-semibold text-slate-900 break-words">{{ $organizer->user->name }}</td>
                                <td>{{ $organizer->type }}</td>
                                <td class="hidden lg:table-cell text-slate-700 break-words">{{ $organizer->address }}</td>
                                <td class="text-right">
                                    <div class="inline-flex items-center gap-2">
                                        <a href="{{ route('organizer.edit', $organizer->user->id) }}" class="btn btn-soft">Edit</a>
                                        <form action="{{ route('organizer.delete', $organizer->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this organizer?');">
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