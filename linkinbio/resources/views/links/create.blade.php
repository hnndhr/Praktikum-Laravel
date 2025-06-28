<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-dark leading-tight">
            Tambah Link Baru
        </h2>
    </x-slot>

    <div class="py-10 bg-soft min-h-screen">
        <div class="max-w-3xl mx-auto px-6">
            <div class="bg-white p-8 shadow rounded-xl">
                <form action="{{ route('links.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-sm font-semibold text-dark mb-1">Judul</label>
                        <input type="text" name="title" value="{{ old('title') }}"
                            class="w-full border border-dark/20 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-primary"
                            required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-dark mb-1">URL</label>
                        <input type="url" name="url" value="{{ old('url') }}"
                            class="w-full border border-dark/20 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-primary"
                            required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-dark mb-1">Deskripsi (Opsional)</label>
                        <textarea name="description" rows="3"
                            class="w-full border border-dark/20 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-primary">{{ old('description') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-dark mb-1">Urutan</label>
                        <input type="number" name="order" value="{{ old('order', 0) }}"
                            class="w-24 border border-dark/20 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-primary"
                            required>
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('links.index') }}"
                            class="mr-4 text-sm text-gray-500 hover:text-dark">Batal</a>

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
