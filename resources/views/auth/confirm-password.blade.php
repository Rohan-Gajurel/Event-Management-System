<x-guest-layout>
    <h2 class="text-2xl font-extrabold tracking-tight text-slate-900">Confirm password</h2>
    <p class="mt-1 text-sm text-slate-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </p>

    <form method="POST" action="{{ route('password.confirm') }}" class="mt-6 space-y-4">
        @csrf

        <!-- Password -->
        <div>
            <label class="block text-sm font-semibold text-slate-900">{{ __('Password') }}</label>
            <input id="password" class="mt-2 input" type="password" name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <button type="submit" class="btn btn-primary w-full">
            {{ __('Confirm') }}
        </button>
    </form>
</x-guest-layout>
