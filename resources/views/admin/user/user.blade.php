@extends('admin.layout')
@section('content')

    <div class="card">
        <div class="card-body">
            <div class="flex flex-wrap items-end justify-between gap-4">
                <div>
                    <h2 class="text-xl font-extrabold tracking-tight text-slate-900">Users</h2>
                    <p class="mt-1 text-sm text-slate-600">Manage user roles and access.</p>
                </div>
            </div>

            <div class="mt-6 space-y-3">
                @if(session('delete_message'))
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        @foreach ($users as $user)
                            <tr>
                                <td class="font-semibold text-slate-900">{{ $i }}</td>
                                <td class="font-semibold text-slate-900">{{ $user->name }}</td>
                                <td class="text-slate-700">{{ $user->email }}</td>
                                <td>
                                    @php $role = strtolower((string) $user->role); @endphp
                                    @if($role === 'admin')
                                        <span class="badge badge-danger">{{ $user->role }}</span>
                                    @elseif($role === 'organizer')
                                        <span class="badge badge-warning">{{ $user->role }}</span>
                                    @else
                                        <span class="badge badge-success">{{ $user->role }}</span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    <div class="inline-flex items-center gap-2">
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-soft">Edit</a>
                                        <form action="{{ route('user.delete', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
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