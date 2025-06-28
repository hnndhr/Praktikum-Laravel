<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-soft leading-tight">
            Tambah Link Baru
        </h2>
    </x-slot>

    <div class="py-10 bg-dark min-h-screen">
        <div class="max-w-3xl mx-auto px-6">
            <div class="bg-dark border border-soft/10 p-8 shadow rounded-xl">
                <form action="{{ route('links.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-sm font-semibold text-soft mb-1">Judul</label>
                        <input type="text" name="title" value="{{ old('title') }}"
                            class="w-full bg-dark text-soft border border-soft/20 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-primary"
                            required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-soft mb-1">URL</label>
                        <input type="url" name="url" value="{{ old('url') }}"
                            class="w-full bg-dark text-soft border border-soft/20 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-primary"
                            required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-soft mb-1">Deskripsi (Opsional)</label>
                        <textarea name="description" rows="3"
                            class="w-full bg-dark text-soft border border-soft/20 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-primary">{{ old('description') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-soft mb-1">Urutan</label>
                        <input type="number" name="order" value="{{ old('order', 0) }}"
                            class="w-24 bg-dark text-soft border border-soft/20 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-primary"
                            required>
                    </div>

                    <div class="flex justify-end items-center space-x-4">
                        <div class='px-6 py-2 bg-soft text-primary font-medium rounded-xl hover:bg-zinc-600 hover:text-soft transition'>
                        <a href="{{ route('links.index') }}">Batal</a>
                        </div>
                        <button type="submit"
                            class="px-6 py-2 bg-primary text-white font-medium rounded-xl hover:bg-accent transition">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
