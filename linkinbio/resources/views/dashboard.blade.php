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
                <p class="text-soft/80 mb-6">
                    Nih link yang udah kamu tambahin.
                </p>

                {{-- Konten Profil dari profile.blade.php --}}
                <div class="max-w-md mx-auto px-4 pt-4 text-center">
                    <img src="{{ $profile['photo'] }}" class="w-24 h-24 rounded-full mx-auto mb-4 shadow-md object-cover">
                    <h1 class="text-2xl font-semibold text-soft">{{ $profile['name'] }}</h1>
                    <p class="text-sm text-soft/80 mb-6">{{ $profile['bio'] }}</p>

                    @foreach($links as $link)
                        <a href="{{ $link->url }}" target="_blank"
                           class="block w-full bg-primary   hover:bg-accent text-white font-medium py-3 px-4 rounded-xl shadow mb-4 transition">
                            {{ $link->title }}
                        </a>
                    @endforeach

                    @if($links->isEmpty())
                        <p class="text-soft/40">Belum ada link ditambahkan.</p>
                    @endif
                </div>
                {{-- Konten Profil berakhir --}}

            </div>
        </div>
    </div>
</x-app-layout>