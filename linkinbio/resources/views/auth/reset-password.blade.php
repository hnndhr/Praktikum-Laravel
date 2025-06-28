<x-guest-layout>
    <x-auth-card>
        <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
            @csrf

            <!-- Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-soft" />
                <x-text-input id="email" type="email" name="email"
                    :value="old('email', $request->email)" required autofocus autocomplete="username"
                    class="mt-1 w-full bg-dark text-soft border border-soft/30 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-primary" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" class="text-soft" />
                <x-text-input id="password" type="password" name="password"
                    required autocomplete="new-password"
                    class="mt-1 w-full bg-dark text-soft border border-soft/30 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-primary" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-soft" />
                <x-text-input id="password_confirmation" type="password" name="password_confirmation"
                    required autocomplete="new-password"
                    class="mt-1 w-full bg-dark text-soft border border-soft/30 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-primary" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-500" />
            </div>

            <div class="flex justify-end">
                <x-primary-button class="bg-primary hover:bg-accent text-white px-6 py-2 rounded-xl">
                    {{ __('Reset Password') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
