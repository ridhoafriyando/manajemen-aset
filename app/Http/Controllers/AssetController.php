<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Tampilkan semua daftar aset
     */
    public function index()
    {
        $assets = Asset::latest()->get();
        return view('assets.index', compact('assets'));
    }

    /**
     * Tampilkan form untuk menambah aset baru
     */
    public function create()
    {
        return view('assets.create');
    }

    /**
     * Simpan data aset baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'code'     => 'required|unique:assets,code',
            'name'     => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'quantity' => 'required|numeric|min:1',
            'status'   => 'required|in:Baik,Rusak,Dipinjam',
            'location' => 'nullable|string|max:255',
        ]);

        Asset::create($request->all());

        return redirect()->route('assets.index')->with('success', 'Aset baru berhasil ditambahkan!');
    }

    /**
     * Tampilkan form untuk mengedit data aset
     */
    public function edit(Asset $asset)
    {
        return view('assets.edit', compact('asset'));
    }

    /**
     * Simpan perubahan data aset yang diperbarui
     */
    public function update(Request $request, Asset $asset)
    {
        $request->validate([
            'code'     => 'required|unique:assets,code,' . $asset->id,
            'name'     => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'quantity' => 'required|numeric|min:1',
            'status'   => 'required|in:Baik,Rusak,Dipinjam',
            'location' => 'nullable|string|max:255',
        ]);

        $asset->update($request->all());

        return redirect()->route('assets.index')->with('success', 'Data aset berhasil diperbarui!');
    }

    /**
     * Hapus data aset dari database
     */
    public function destroy(Asset $asset)
    {
        $asset->delete();
        return redirect()->route('assets.index')->with('success', 'Data aset berhasil dihapus!');
    }
}