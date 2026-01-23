@extends('admin.layout')

@section('content')
    <div class="mx-auto max-w-4xl">
        <div class="card">
            <div class="card-body">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <div>
                        <h2 class="text-xl font-extrabold tracking-tight text-slate-900">Create organizer</h2>
                        <p class="mt-1 text-sm text-slate-600">Create an organizer profile for a user.</p>
                    </div>
                    <a href="{{ route('organizer.index') }}" class="btn btn-soft">Back</a>
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

                <form action="{{ route('organizer.store') }}" class="mt-6 grid grid-cols-1 gap-4 md:grid-cols-2" method="POST">
                    @csrf

                    <div>
                        <label class="block text-sm font-semibold text-slate-900">User</label>
                        <select class="mt-2 select" name="user_id">
                            <option selected disabled>Name</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-900">Type</label>
                        <select class="mt-2 select" name="type">
                            <option selected disabled>Type</option>
                            <option value="individual">Individual</option>
                            <option value="company">Company</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-slate-900">Address</label>
                        <input type="text" placeholder="Address" class="mt-2 input" name="address" value="{{ old('address') }}">
                    </div>

                    <div class="md:col-span-2 flex items-center justify-end gap-3 pt-2">
                        <button type="submit" class="btn btn-primary">Create organizer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection