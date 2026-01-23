@extends('frontend.layout')
@section("content")
    <section class="page-section">
        <div class="container-page">
            <div class="mx-auto max-w-xl">
                <div class="mb-6 text-center">
                    <h2 class="text-2xl font-extrabold tracking-tight text-slate-900">Organizer Details</h2>
                    <p class="mt-1 text-sm text-slate-600">Complete your organizer profile.</p>
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

                        <form action="{{ route('organizer.store') }}" method="POST" class="space-y-5">
                            @csrf

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
                                <label class="block text-sm font-semibold text-slate-900">Type</label>
                                <select name="type" required class="mt-2 select">
                                    <option value="" disabled selected>Select Type</option>
                                    <option value="individual">Individual</option>
                                    <option value="company">Company</option>
                                </select>
                                <x-input-error :messages="$errors->get('type')" class="mt-1" />
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-900">Address</label>
                                <input type="text" name="address" placeholder="Address" class="mt-2 input">
                                <x-input-error :messages="$errors->get('address')" class="mt-1" />
                            </div>

                            <button type="submit" class="btn btn-primary w-full">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
        

@endsection
