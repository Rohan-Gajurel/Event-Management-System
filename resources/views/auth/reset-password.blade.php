<x-guest-layout>
    <h2 class="text-2xl font-extrabold tracking-tight text-slate-900">Reset password</h2>
    <p class="mt-1 text-sm text-slate-600">Choose a new password for your account.</p>

    <form method="POST" action="{{ route('password.store') }}" class="mt-6 space-y-4">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <label class="block text-sm font-semibold text-slate-900">{{ __('Email') }}</label>
            <input id="email" class="mt-2 input" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label class="block text-sm font-semibold text-slate-900">{{ __('Password') }}</label>
            <input id="password" class="mt-2 input" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label class="block text-sm font-semibold text-slate-900">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" class="mt-2 input" type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <button type="submit" class="btn btn-primary w-full">
            {{ __('Reset Password') }}
        </button>
    </form>
</x-guest-layout>
