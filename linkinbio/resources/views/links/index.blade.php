<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Link
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('links.create') }}" class="mb-4 inline-block bg-emerald-600 text-white px-4 py-2 rounded hover:bg-emerald-700 transition">+ Tambah Link</a>

                @if(session('success'))
                    <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="min-w-full bg-white shadow rounded overflow-hidden">
                    <thead>
                        <tr>
                            <th class="text-left py-2 px-4">Judul</th>
                            <th class="text-left py-2 px-4">URL</th>
                            <th class="text-left py-2 px-4">Urutan</th>
                            <th class="text-left py-2 px-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($links as $link)
                            <tr class="border-t">
                                <td class="py-2 px-4">{{ $link->title }}</td>
                                <td class="py-2 px-4">{{ $link->url }}</td>
                                <td class="py-2 px-4">{{ $link->order }}</td>
                                <td class="py-2 px-4">
                                    <a href="{{ route('links.edit', $link->id) }}" class="text-indigo-600 hover:underline">Edit</a>
                                    <form action="{{ route('links.destroy', $link->id) }}" method="POST" class="inline ml-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin hapus link ini?')" class="text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($links->isEmpty())
                    <p class="text-gray-500 mt-4">Belum ada link ditambahkan.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
