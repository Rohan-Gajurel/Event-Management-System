<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    {{-- <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form> --}}

        <h2 class="text-2xl font-extrabold tracking-tight text-slate-900">Welcome back</h2>
        <p class="mt-1 text-sm text-slate-600">Login to continue.</p>

        <form action="{{ route('login') }}" method="POST" class="mt-6 space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-semibold text-slate-900">Email</label>
            <input type="email" name="email" placeholder="you@example.com" class="mt-2 input" value="{{ old('email') }}" required autofocus autocomplete="username">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-900">Password</label>
            <input type="password" name="password" placeholder="••••••••" class="mt-2 input" required autocomplete="current-password">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between">
            <label class="inline-flex items-center gap-2 text-sm text-slate-700">
                <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-indigo-600 focus:ring-indigo-500" name="remember">
                Remember me
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm font-semibold text-indigo-700 hover:text-indigo-800">
                    Forgot password?
                </a>
            @endif
        </div>

        <button type="submit" class="btn btn-primary w-full">Login</button>
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
            Don't have an account?
            <a href="{{ route('register') }}" class="font-semibold text-indigo-700 hover:text-indigo-800">Register</a>
        </p>

</x-guest-layout>
