@extends('frontend.layout')

@section('content')
<section class="page-section py-10">
    <div class="container-page">
        <div class="mx-auto max-w-2xl">

            {{-- Back Button --}}
            <div class="mb-6">
                <a href="{{ route('event_list') }}" class="btn btn-soft">
                    ← Back
                </a>
            </div>

            <div class="card shadow-sm">
                <div class="card-body p-6">

                    {{-- Header --}}
                    <div class="mb-6">
                        <h1 class="text-2xl font-extrabold tracking-tight text-slate-900">
                            Complete your profile
                        </h1>
                        <p class="mt-1 text-sm text-slate-600">
                            Manage your personal information
                        </p>
                    </div>

                    {{-- Validation Errors --}}
                    @if($errors->any())
                        <div class="mb-6 rounded-md bg-red-50 p-4 text-sm text-red-700">
                            <ul class="list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form
                        action="{{ route('profile.store') }}"
                        method="POST"
                        enctype="multipart/form-data"
                        class="space-y-5"
                    >
                        @csrf
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
                                value="{{ old('address', auth()->user()->address) }}"
                                class="mt-2 input w-full"
                                placeholder="Enter your address"
                            >
                        </div>

                        {{-- Profile Image --}}
                        <div>
                            <label class="block text-sm font-semibold text-slate-900">
                                Profile Image
                            </label>
                            <p class="mt-1 text-xs text-slate-500">
                                Upload a clear profile photo
                            </p>

                            <input
                                type="file"
                                name="image"
                                class="mt-2 input w-full"
                            >

                            @if(auth()->user()->image)
                                <img
                                    src="{{ asset('storage/' . auth()->user()->image) }}"
                                    alt="Profile Image"
                                    class="mt-3 h-20 w-20 rounded-full object-cover"
                                >
                            @endif
                        </div>

                        {{-- Account Type --}}
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
                                    {{ old('type', auth()->user()->type) === 'individual' ? 'selected' : '' }}>
                                    Individual
                                </option>
                                <option value="company"
                                    {{ old('type', auth()->user()->type) === 'company' ? 'selected' : '' }}>
                                    Company
                                </option>
                            </select>
                        </div>

                        {{-- Company Name --}}
                        <div id="companyField" class="hidden">
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
                        <div class="pt-4">
                            <button type="submit" class="btn btn-primary w-full">
                                Save Profile
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

{{-- JS --}}
<script>
    function toggleCompany() {
        const type = document.getElementById('type').value;
        const companyField = document.getElementById('companyField');

        if (type === 'company') {
            companyField.classList.remove('hidden');
        } else {
            companyField.classList.add('hidden');
        }
    }

    document.addEventListener('DOMContentLoaded', toggleCompany);
</script>
@endsection
