<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-soft leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-10 bg-dark min-h-screen">
        <div class="max-w-5xl mx-auto px-6">
            <div class="bg-dark border border-soft/10 shadow-md rounded-xl p-8 text-center">
                <h1 class="text-3xl font-bold text-primary mb-4">
                    Selamat datang, {{ Auth::user()->name }}!
                </h1>
                <p class="text-soft/80">
                    Kelola link yang ingin kamu tampilkan di halaman profilmu.
                </p>

                <div class="mt-6">
                    <a href="{{ route('links.index') }}"
                       class="inline-block bg-primary hover:bg-accent text-white px-6 py-3 rounded-xl shadow transition">
                        Kelola Link
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
