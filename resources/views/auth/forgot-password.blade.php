<x-guest-layout>
    <h2 class="text-2xl font-extrabold tracking-tight text-slate-900">Forgot password</h2>
    <p class="mt-1 text-sm text-slate-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </p>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="mt-6 space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <label class="block text-sm font-semibold text-slate-900">{{ __('Email') }}</label>
            <input id="email" class="mt-2 input" type="email" name="email" value="{{ old('email') }}" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <button type="submit" class="btn btn-primary w-full">
            {{ __('Email Password Reset Link') }}
        </button>
    </form>
</x-guest-layout>
