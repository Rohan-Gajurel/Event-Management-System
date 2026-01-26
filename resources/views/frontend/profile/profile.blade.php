@extends('frontend.layout')
@section("content")
    <section class="page-section">
        <div class="mt-6 space-y-3">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <span class="font-semibold">{{ session('success') }}</span>
                    </div>
                @elseif(session('update_message'))
                    <div class="alert alert-warning" role="alert">
                        <span class="font-semibold">{{ session('update_message') }}</span>
                    </div>
                @endif
            </div>
        <div class="container-page">
        <!-- Profile Header -->
        <div class="flex flex-col sm:flex-row items-center gap-6">

            @if(!empty($profile->profile_image))
    <img
        src="{{ asset('storage/' . $profile->profile_image) }}"
        alt="User Avatar"
        class="w-32 h-32 rounded-full object-cover border-4 border-gray-200"
    >
    @else
    <img
        src="{{ asset('build/assets/avatar.jpg') }}"
        alt="Default Avatar"
        class="w-32 h-32 rounded-full object-cover border-4 border-gray-200"
    >
    @endif      
            <div class="text-center sm:text-left">
                <h2 class="text-2xl font-bold text-gray-800">
                    {{ $user->name }}
                </h2>
                <p class="text-gray-500">
                    {{ $user->email }}
                </p>
                <span class="inline-block mt-2 px-3 py-1 text-sm rounded-full bg-blue-100 text-blue-600">
                    {{ $user->role }}
                </span>
            </div>
        </div>

        <!-- Bio -->
        <div class="mt-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">
                About
            </h3>
            
        </div>

        <!-- Info Section -->
        <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                
                <p class="text-sm text-gray-500">Type</p>
                @if($profile->type ==='company' )
                <p class="text-gray-800 font-medium">
                    Company
                </p>
                @else
                <p class="text-gray-800 font-medium">
                    Individual
                </p>
                @endif
            </div>

            <div>
                <p class="text-sm text-gray-500">Address</p>
                <p class="text-gray-800 font-medium">
                     {{ $profile->address }}
                </p>
            </div>

            
            <div>
                <p class="text-sm text-gray-500">Joined</p>
                <p class="text-gray-800 font-medium">
                    {{ $user->created_at->format('d M Y') }}
                </p>
            </div>
           
            @if($profile->type ==='company' )
            <div>
                <p class="text-sm text-gray-500">Company</p>
                <p class="text-gray-800 font-medium">
                     {{ $profile->company_name }}
                </p>
            </div>
            @endif

            @if($user->verified)
            <div>
                <p class="text-sm text-gray-500">Status</p>
                <p class="text-green-600 font-semibold">
                    Active
                </p>
            </div>
            @endif
        </div>

        <!-- Actions -->
        <div class="mt-10 flex justify-end gap-3">
            <button class="px-5 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300">
                Back
            </button>
        <a href="{{ route('profile.edit') }}">
            <button class="px-5 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700">
                Edit Profile
            </button>
        </a>
        </div>

    </div>

@endsection
