<x-guest-layout>
    {{-- <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form> --}}

    <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>


    <form action="{{ route('register') }}" method="POST" class="space-y-5">
        @csrf

        <!-- Name -->
        <div>
            <input
                type="text"
                name="name"
                placeholder="Full Name"
                value="{{ old('name') }}"
                class="w-full rounded-lg border-gray-300 p-3 focus:border-green-500 focus:ring-green-500"
            >
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
        </div>

        <!-- Email -->
        <div>
            <input
                type="email"
                name="email"
                placeholder="Email Address"
                value="{{ old('email') }}"
                class="w-full rounded-lg border-gray-300 p-3 focus:border-green-500 focus:ring-green-500"
            >
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Password -->
        <div>
            <input
                type="password"
                name="password"
                placeholder="Password"
                class="w-full rounded-lg border-gray-300 p-3 focus:border-green-500 focus:ring-green-500"
            >
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Confirm Password -->
        <div>
            <input
                type="password"
                name="password_confirmation"
                placeholder="Confirm Password"
                class="w-full rounded-lg border-gray-300 p-3 focus:border-green-500 focus:ring-green-500"
            >
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
        </div>

        <!-- Role -->
        <div>
            <select
                name="role"
                required
                class="w-full rounded-lg border-gray-300 p-3 bg-white focus:border-green-500 focus:ring-green-500"
            >
                <option value="" disabled selected>Select Role</option>
                <option value="organizer" >
                    Organizer
                </option>
                <option value="participant" >
                    Participant
                </option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-1" />
        </div>

        <!-- Submit -->
        <button
            type="submit"
            class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-lg transition"
        >
            Register
        </button>
    </form>

    <p class="mt-6 text-center text-sm">
        Already have an account?
        <a href="{{ route('login') }}" class="text-green-600 hover:underline font-medium">
            Login
        </a>
    </p>
</x-guest-layout>
