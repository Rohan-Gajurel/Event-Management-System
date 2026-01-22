@extends('frontend.layout')
@section("content")
    <h2 class="text-2xl font-bold mb-6 text-center">Organizer Detail</h2>
    @if($errors->any())
            <div class="bg-red-100 text-sm text-red-700 rounded-md p-4 m-4" role="alert">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif

    <form action="{{ route('organizer.store') }}" method="POST" class="space-y-5">
        @csrf

        <!-- Name -->
        <div>
            <input
                type="text"
                name="name"
                placeholder="{{ auth()->user()->name }}"
                class="w-full rounded-lg border-gray-300 p-3 focus:border-green-500 focus:ring-green-500"
            readonly >
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
        </div>

        <!-- Type -->
        <div>
            <select
                name="type"
                required
                class="w-full rounded-lg border-gray-300 p-3 bg-white focus:border-green-500 focus:ring-green-500"
            >
                <option value="" disabled selected>Select Type</option>
                <option value="individual" >
                    Individual
                </option>
                <option value="company" >
                    Company
                </option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-1" />
        </div>

        

        <!-- Address -->
        <div>
            <input
                type="text"
                name="address"
                placeholder="Address"
                class="w-full rounded-lg border-gray-300 p-3 focus:border-green-500 focus:ring-green-500"
            >
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
        </div>

        <!-- Submit -->
        <button
            type="submit"
            class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-lg transition"
        >
            Submit
        </button>
    </form>
        

@endsection
