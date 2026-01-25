@extends('admin.layout')

@section('content')
<div class="mx-auto max-w-4xl">
    <div class="card">
        <div class="card-body">

            <div class="flex items-center justify-between gap-4">
                <div>
                    <h2 class="text-xl font-extrabold tracking-tight text-slate-900">
                        Edit Profile
                    </h2>
                    <p class="mt-1 text-sm text-slate-600">
                        Update user and profile details.
                    </p>
                </div>
                <a href="{{ route('user_profile') }}" class="btn btn-soft">Back</a>
            </div>

            {{-- Errors --}}
            @if($errors->any())
                <div class="alert alert-danger mt-6">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                action="{{ route('organizer.update',$profile->id) }}"
                method="POST"
                enctype="multipart/form-data"
                class="mt-6 grid grid-cols-1 gap-4 md:grid-cols-2"
            >
                @csrf
                @method('PUT')

                {{-- Username --}}
                <div>
                    <label class="block text-sm font-semibold text-slate-900">Username</label>
                    <input
                        type="text"
                        name="username"
                        value="{{ old('username', $profile->user->name) }}"
                        class="mt-2 input"
                    >
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-semibold text-slate-900">Email</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $profile->user->email) }}"
                        class="mt-2 input"
                    >
                </div>

                {{-- Role --}}
                <div>
                    <label class="block text-sm font-semibold text-slate-900">Role</label>
                    <select name="role" class="mt-2 select">
                        <option value="participant" {{ $profile->user->role === 'participant' ? 'selected' : '' }}>
                            Participant
                        </option>
                        <option value="organizer" {{ $profile->user->role === 'organizer' ? 'selected' : '' }}>
                            Organizer
                        </option>
                    </select>
                </div>

                {{-- Account Type --}}
                <div>
                    <label class="block text-sm font-semibold text-slate-900">Account Type</label>
                    <select
                        name="type"
                        id="type"
                        class="mt-2 select"
                        onchange="toggleCompany()"
                    >
                        <option value="individual" {{ $profile?->type === 'individual' ? 'selected' : '' }}>
                            Individual
                        </option>
                        <option value="company" {{ $profile?->type === 'company' ? 'selected' : '' }}>
                            Company
                        </option>
                    </select>
                </div>

                {{-- Address --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-900">Address</label>
                    <input
                        type="text"
                        name="address"
                        value="{{ old('address', $profile->address) }}"
                        class="mt-2 input"
                    >
                </div>

                {{-- Company Name --}}
                <div
                    id="companyField"
                    class="md:col-span-2 {{ $profile?->type !== 'company' ? 'hidden' : '' }}"
                >
                    <label class="block text-sm font-semibold text-slate-900">Company Name</label>
                    <input
                        type="text"
                        name="company_name"
                        value="{{ old('company_name', $profile->company_name) }}"
                        class="mt-2 input"
                    >
                </div>

                {{-- Profile Image --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-900">Profile Image</label>

                    <div class="flex items-center gap-4 mt-2">
                        <img
                            src="{{ $profile?->profile_image
                                ? asset('storage/'.$profile->profile_image)
                                : asset('default-avatar.png') }}"
                            class="w-20 h-20 rounded-full object-cover border"
                        >

                        <input type="file" name="image" class="input">
                    </div>
                </div>

                {{-- Submit --}}
                <div class="md:col-span-2 flex justify-end pt-2">
                    <button type="submit" class="btn btn-primary">
                        Update Profile
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    function toggleCompany() {
        const type = document.getElementById('type').value;
        document
            .getElementById('companyField')
            .classList.toggle('hidden', type !== 'company');
    }
</script>
@endsection
