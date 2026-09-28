<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Aset') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('assets.update', $asset->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block text-sm font-medium">Kode Aset</label>
                        <input type="text" name="code" value="{{ old('code', $asset->code) }}" required class="w-full border-gray-300 rounded-md shadow-sm p-2 border">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Nama Aset / Barang</label>
                        <input type="text" name="name" value="{{ old('name', $asset->name) }}" required class="w-full border-gray-300 rounded-md shadow-sm p-2 border">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Kategori</label>
                        <input type="text" name="category" value="{{ old('category', $asset->category) }}" required class="w-full border-gray-300 rounded-md shadow-sm p-2 border">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium">Jumlah</label>
                            <input type="number" name="quantity" value="{{ old('quantity', $asset->quantity) }}" required class="w-full border-gray-300 rounded-md shadow-sm p-2 border">
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Status</label>
                            <select name="status" class="w-full border-gray-300 rounded-md shadow-sm p-2 border">
                                <option value="Baik" {{ $asset->status == 'Baik' ? 'selected' : '' }}>Baik</option>
                                <option value="Rusak" {{ $asset->status == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                                <option value="Dipinjam" {{ $asset->status == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Lokasi Penyimpanan</label>
                        <input type="text" name="location" value="{{ old('location', $asset->location) }}" class="w-full border-gray-300 rounded-md shadow-sm p-2 border">
                    </div>
                    <div class="flex justify-end space-x-2 pt-4">
                        <a href="{{ route('assets.index') }}" class="px-4 py-2 bg-gray-300 rounded">Batal</a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Update Aset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>