<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-soft leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-dark min-h-screen">
        <div class="max-w-5xl mx-auto px-6 space-y-8">
            <!-- Update Profile Info -->
            <div class="bg-dark border border-soft/10 shadow rounded-xl p-6 sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="bg-dark border border-soft/10 shadow rounded-xl p-6 sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account -->
            <div class="bg-dark border border-soft/10 shadow rounded-xl p-6 sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
