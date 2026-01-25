@extends('frontend.layout')
@section("content")
    <section class="page-section">
        <div class="container-page">
            <div class="mx-auto max-w-xl">
                <div class="mb-6 text-center">
                    <h2 class="text-2xl font-extrabold tracking-tight text-slate-900">User Details</h2>
                    <p class="mt-1 text-sm text-slate-600">Complete your profile.</p>
                </div>

                <div class="card">
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger mb-6" role="alert">
                                <ul class="list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('user.role_submit') }}" method="POST" class="space-y-5">
                            @csrf
                            @method('PUT')
                            <div>
                                <label class="block text-sm font-semibold text-slate-900">Name</label>
                                <input
                                    type="text"
                                    name="name"
                                    value="{{ auth()->user()->name }}"
                                    class="mt-2 input"
                                    readonly
                                >
                                <x-input-error :messages="$errors->get('name')" class="mt-1" />
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-900">Role</label>
                                <select name="role" required class="mt-2 select">
                                    <option value="" disabled selected>Select Role</option>
                                    <option value="participant">Participant</option>
                                    <option value="organizer">Organizer</option>
                                </select>
                                <x-input-error :messages="$errors->get('role')" class="mt-1" />
                            </div>

                            <button type="submit" class="btn btn-primary w-full">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
        

@endsection
