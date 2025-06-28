<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-10 ">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-xl p-8 text-center">
                <h1 class="text-3xl font-bold text-emerald-600 mb-4">Selamat datang, {{ Auth::user()->name }}!</h1>
                <p class="text-gray-600">Kelola link yang ingin kamu tampilkan di halaman profilmu.</p>

                <div class="mt-6">
                    <a href="{{ route('links.index') }}"
                        class="inline-block bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-xl shadow transition">
                        Kelola Link
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
