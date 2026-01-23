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

    <h2 class="text-2xl font-extrabold tracking-tight text-slate-900">Create account</h2>
    <p class="mt-1 text-sm text-slate-600">Join and start booking events.</p>

    <form action="{{ route('register') }}" method="POST" class="mt-6 space-y-5">
        @csrf

        <!-- Name -->
        <div>
            <label class="block text-sm font-semibold text-slate-900">Full name</label>
            <input
                type="text"
                name="name"
                placeholder="Full Name"
                value="{{ old('name') }}"
                class="mt-2 input"
            >
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
        </div>

        <!-- Email -->
        <div>
            <label class="block text-sm font-semibold text-slate-900">Email</label>
            <input
                type="email"
                name="email"
                placeholder="Email Address"
                value="{{ old('email') }}"
                class="mt-2 input"
            >
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Password -->
        <div>
            <label class="block text-sm font-semibold text-slate-900">Password</label>
            <input
                type="password"
                name="password"
                placeholder="Password"
                class="mt-2 input"
            >
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label class="block text-sm font-semibold text-slate-900">Confirm password</label>
            <input
                type="password"
                name="password_confirmation"
                placeholder="Confirm Password"
                class="mt-2 input"
            >
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
        </div>

        <!-- Role -->
        <div>
            <label class="block text-sm font-semibold text-slate-900">Role</label>
            <select
                name="role"
                required
                class="mt-2 select"
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
        <button type="submit" class="btn btn-primary w-full">Register</button>
    </form>
    <div class="mt-6 flex items-center justify-center gap-3">
        <a href="{{ route('auth.redirection','google') }}" class="btn btn-soft">
            <span class="sr-only">Continue with Google</span>
            <img src="{{ asset('build/assets/gogole-logo.jpg') }}" alt="Google" height="20" width="20">
            Google
        </a>
        <a href="{{ route('auth.redirection','facebook') }}" class="btn btn-soft">
            <span class="sr-only">Continue with Facebook</span>
            <img src="{{ asset('build/assets/facebook-logo.jpg') }}" alt="Facebook" height="20" width="20">
            Facebook
        </a>
    </div>

    <p class="mt-6 text-center text-sm text-slate-600">
        Already have an account?
        <a href="{{ route('login') }}" class="font-semibold text-indigo-700 hover:text-indigo-800">
            Login
        </a>
    </p>
</x-guest-layout>
