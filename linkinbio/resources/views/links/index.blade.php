<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-dark leading-tight">
            Daftar Link Kamu
        </h2>
    </x-slot>

    <div class="py-10 bg-dark min-h-screen">
        <div class="max-w-4xl mx-auto px-6">
            @if(session('success'))
                <div class="mb-4 p-4 rounded-xl bg-primary text-white font-medium shadow">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-semibold text-dark">Kelola Link</h3>
                <a href="{{ route('links.create') }}"
                   class="inline-block px-4 py-2 bg-primary text-white font-semibold rounded-xl hover:bg-accent transition">
                    + Tambah Link
                </a>
            </div>

            @if($links->isEmpty())
                <div class="text-gray-500 text-center py-10">Belum ada link yang ditambahkan.</div>
            @else
                <div class="bg-dark shadow rounded-xl overflow-x-auto">
                    <table class="min-w-full table-auto text-sm text-left">
                        <thead class="bg-dark text-soft">
                            <tr>
                                <th class="px-4 py-3 border-b border-white/20">Judul</th>
                                <th class="px-4 py-3 border-b border-white/20">URL</th>
                                <th class="px-4 py-3 border-b border-white/20">Urutan</th>
                                <th class="px-4 py-3 border-b border-white/20 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($links as $link)
                                <tr class="hover:bg-accent/70 transition">
                                    <td class="px-4 py-3 border-b border-white/10">{{ $link->title }}</td>
                                    <td class="px-4 py-3 border-b border-white/10 text-blue-600">
                                        <a href="{{ $link->url }}" target="_blank" class="hover:underline">
                                            {{ $link->url }}
                                        </a>
                                    </td>
                                    <td class="px-4 py-3 border-b border-white/10">{{ $link->order }}</td>
                                    <td class="px-4 py-3 border-b border-white/10 text-right space-x-2">
                                        <a href="{{ route('links.edit', $link) }}"
                                           class="inline-block px-3 py-1 text-sm bg-primary text-white rounded hover:bg-accent transition">
                                            Edit
                                        </a>
                                        <form action="{{ route('links.destroy', $link) }}" method="POST"
                                              class="inline-block"
                                              onsubmit="return confirm('Yakin ingin menghapus link ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="px-3 py-1 text-sm bg-red-600 text-white rounded hover:bg-red-700 transition">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
