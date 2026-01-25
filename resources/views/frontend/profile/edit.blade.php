@extends('frontend.layout')

@section('content')
<section class="page-section">
    <div class="container-page">
        <div class="mx-auto max-w-2xl">

            <div class="mb-6">
                <a href="{{ route('user_profile')}}" class="btn btn-soft">Back</a>
            </div>

            <div class="card">
                <div class="card-body">

                    <div class="mb-6">
                        <h1 class="text-2xl font-extrabold tracking-tight text-slate-900">
                            My Profile
                        </h1>
                        <p class="mt-1 text-sm text-slate-600">
                            Update your personal information
                        </p>
                    </div>

                    {{-- Errors --}}
                    @if($errors->any())
                        <div class="alert alert-danger mb-6">
                            <ul class="list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form
                        action="{{ route('profile.update') }}"
                        method="POST"
                        enctype="multipart/form-data"
                        class="space-y-5"
                    >
                        @csrf
                        @method('PUT')
                        {{-- User Info --}}
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                                {{-- Username --}}
                                <div>
                                    <label class="block text-sm font-semibold text-slate-900">
                                        Username
                                    </label>
                                    <input
                                        type="text"
                                        name="username"
                                        value="{{ old('username', auth()->user()->name) }}"
                                        class="mt-2 input w-full"
                                        placeholder="Enter username"
                                    >
                                </div>

                                {{-- Email --}}
                                <div>
                                    <label class="block text-sm font-semibold text-slate-900">
                                        Email
                                    </label>
                                    <input
                                        type="email"
                                        name="email"
                                        value="{{ old('email', auth()->user()->email) }}"
                                        class="mt-2 input w-full"
                                        placeholder="Enter email"
                                    >
                                </div>

                            </div>

                            {{-- Role --}}

                            <div>
                            <label class="block text-sm font-semibold text-slate-900">
                                Role
                            </label>
                            <select
                                name="role"
                                id="role"
                                class="mt-2 input w-full"
                            >
                                <option value="participant"
                                    {{ auth()->user()->role === 'participant' ? 'selected' : '' }}>
                                    Participant
                                </option>
                                <option value="organizer"
                                    {{ auth()->user()->role === 'organizer' ? 'selected' : '' }}>
                                    Organizer
                                </option>
                            </select>
                        </div>

                        {{-- Address --}}
                        <div>
                            <label class="block text-sm font-semibold text-slate-900">
                                Address
                            </label>
                            <input
                                type="text"
                                name="address"
                                value="{{ old('address', $profile->address) }}"
                                class="mt-2 input w-full"
                                placeholder="Enter your address"
                            >
                        </div>

                        {{-- Profile Image --}}
                        <div>
                            <label class="block text-sm font-semibold text-slate-900">
                                Profile Image
                            </label>
                            <img
                src="{{ asset('storage/'.$profile->profile_image) }}"
                name="image"
                alt="User Avatar"
                class="w-32 h-32 rounded-full object-cover border-4 border-gray-200"
            />
                            <p class="mt-1 text-xs text-slate-500">
                                Upload a clear profile photo
                            </p>

                            <input
                                type="file"
                                name="image"
                                class="mt-2 input w-full"
                            >

                        </div>

                        {{-- Type --}}
                        <div>
                            <label class="block text-sm font-semibold text-slate-900">
                                Account Type
                            </label>
                            <select
                                name="type"
                                id="type"
                                class="mt-2 input w-full"
                                onchange="toggleCompany()"
                            >
                                <option value="individual"
                                    {{ auth()->user()->type === 'individual' ? 'selected' : '' }}>
                                    Individual
                                </option>
                                <option value="company"
                                    {{ auth()->user()->type === 'company' ? 'selected' : '' }}>
                                    Company
                                </option>
                            </select>
                        </div>

                        {{-- Company Name --}}
                        <div id="companyField" class="{{ auth()->user()->type !== 'company' ? 'hidden' : '' }}">
                            <label class="block text-sm font-semibold text-slate-900">
                                Company Name
                            </label>
                            <input
                                type="text"
                                name="company_name"
                                value="{{ old('company_name', auth()->user()->company_name) }}"
                                class="mt-2 input w-full"
                                placeholder="Enter company name"
                            >
                        </div>

                        {{-- Submit --}}
                        <div class="pt-3">
                            <button type="submit" class="btn btn-primary w-full">
                                Update Profile
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

<script>
    function toggleCompany() {
        const type = document.getElementById('type').value;
        const companyField = document.getElementById('companyField');
        companyField.classList.toggle('hidden', type !== 'company');
    }
</script>
@endsection
