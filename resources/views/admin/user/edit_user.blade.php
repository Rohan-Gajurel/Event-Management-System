@extends('admin.layout')

@section('content')
    <div class="mx-auto max-w-3xl">
        <div class="card">
            <div class="card-body">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <div>
                        <h2 class="text-xl font-extrabold tracking-tight text-slate-900">Edit user role</h2>
                        <p class="mt-1 text-sm text-slate-600">Update permissions for this user.</p>
                    </div>
                    <a href="{{ route('user.index') }}" class="btn btn-soft">Back</a>
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

                <form action="{{ route('user.update', $user->id) }}" class="mt-6 grid grid-cols-1 gap-4 md:grid-cols-2" method="POST">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-semibold text-slate-900">Name</label>
                        <input type="text" class="mt-2 input" value="{{ $user->name }}" readonly>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-900">Role</label>
                        <select class="mt-2 select" name="role">
                            <option selected disabled>Role</option>
                            <option value="organizer" {{ $user->role=="organizer" ? 'selected':'' }}>Organizer</option>
                            <option value="participant" {{ $user->role=="participant" ? 'selected':'' }}>Participant</option>
                            <option value="admin" {{ $user->role=="admin" ? 'selected':'' }}>Admin</option>
                        </select>
                    </div>

                    <div class="md:col-span-2 flex items-center justify-end gap-3 pt-2">
                        <button type="submit" class="btn btn-primary">Update user</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection