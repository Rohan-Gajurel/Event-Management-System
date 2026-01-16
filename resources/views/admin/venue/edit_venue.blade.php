@extends('admin.layout')

@section('content')
<div class="max-w-3xl mx-auto">

    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-2xl font-semibold mb-6">Update Venue</h2>

        {{-- Error Messages --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 rounded-md p-4 mb-6">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form --}}
        <form 
            action="{{ route('venue.update', $venue->id) }}" 
            method="POST" 
            class="grid grid-cols-1 md:grid-cols-2 gap-6"
        >
            @csrf
            @method('PUT')

            {{-- Venue Name --}}
            <div class="col-span-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Venue Name
                </label>
                <input 
                    type="text" 
                    name="name" 
                    value="{{ old('name', $venue->name) }}"
                    placeholder="Enter venue name"
                    class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
                >
            </div>

            {{-- Address --}}
            <div class="col-span-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Address
                </label>
                <input 
                    type="text" 
                    name="address" 
                    value="{{ old('address', $venue->address) }}"
                    placeholder="Enter venue address"
                    class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
                >
            </div>
            <div class="col-span-full flex justify-end mt-4">
                <button 
                    type="submit"
                    class="px-6 py-3 bg-blue-600 text-white rounded-md font-medium hover:bg-blue-700 transition"
                >
                    Update Venue
                </button>
            </div>

        </form>
    </div>

</div>
@endsection
