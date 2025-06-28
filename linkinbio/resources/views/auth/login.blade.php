<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-soft" />
            <x-text-input id="email" type="email" name="email"
                :value="old('email')" required autofocus autocomplete="username"
                class="mt-1 w-full bg-dark text-soft border border-soft/30 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-primary" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="text-soft" />
            <x-text-input id="password" type="password" name="password"
                required autocomplete="current-password"
                class="mt-1 w-full bg-dark text-soft border border-soft/30 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-primary" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input id="remember_me" type="checkbox" name="remember"
                class="rounded border-soft/40 text-primary focus:ring-primary bg-dark">
            <label for="remember_me" class="ms-2 text-sm text-soft/80"> {{ __('Remember me') }} </label>
        </div>

        <div class="flex items-center justify-between">
            @if (Route::has('password.request'))
                <a class="text-sm text-soft/70 hover:text-soft underline"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="bg-primary hover:bg-accent text-white px-6 py-2 rounded-xl">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
