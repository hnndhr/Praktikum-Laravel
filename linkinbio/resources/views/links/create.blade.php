<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Link Baru
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded p-6">

                <form action="{{ route('links.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Judul</label>
                        <input type="text" name="title" value="{{ old('title') }}" required
                            class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:ring focus:ring-emerald-200" />
                        @error('title') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">URL</label>
                        <input type="url" name="url" value="{{ old('url') }}" required
                            class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:ring focus:ring-emerald-200" />
                        @error('url') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Deskripsi (opsional)</label>
                        <textarea name="description"
                            class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:ring focus:ring-emerald-200">{{ old('description') }}</textarea>
                        @error('description') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Urutan Tampil</label>
                        <input type="number" name="order" value="{{ old('order', 0) }}"
                            class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:ring focus:ring-emerald-200" />
                        @error('order') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('links.index') }}" class="mr-4 text-gray-600 hover:underline">Batal</a>
                        <button type="submit"
                            class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded transition">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
