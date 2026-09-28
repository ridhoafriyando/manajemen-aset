<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manajemen Aset Sekolah') }}
            </h2>
            <a href="{{ route('assets.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">
                + Tambah Aset Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b bg-gray-50">
                                <th class="p-3">Kode Aset</th>
                                <th class="p-3">Nama Barang</th>
                                <th class="p-3">Kategori</th>
                                <th class="p-3">Jumlah</th>
                                <th class="p-3">Status</th>
                                <th class="p-3">Lokasi</th>
                                <th class="p-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($assets as $asset)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-3 font-semibold">{{ $asset->code }}</td>
                                    <td class="p-3">{{ $asset->name }}</td>
                                    <td class="p-3">{{ $asset->category }}</td>
                                    <td class="p-3">{{ $asset->quantity }}</td>
                                    <td class="p-3">
                                        <span class="px-2 py-1 rounded text-xs font-bold 
                                            {{ $asset->status == 'Baik' ? 'bg-green-100 text-green-800' : '' }}
                                            {{ $asset->status == 'Rusak' ? 'bg-red-100 text-red-800' : '' }}
                                            {{ $asset->status == 'Dipinjam' ? 'bg-yellow-100 text-yellow-800' : '' }}">
                                            {{ $asset->status }}
                                        </span>
                                    </td>
                                    <td class="p-3">{{ $asset->location ?? '-' }}</td>
                                    <td class="p-3 text-center space-x-2">
                                        <a href="{{ route('assets.edit', $asset->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                        <form action="{{ route('assets.destroy', $asset->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin mau hapus aset ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="p-4 text-center text-gray-500">Belum ada data aset. Silakan tambah data baru.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>