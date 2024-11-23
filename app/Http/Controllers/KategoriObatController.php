<?php

namespace App\Http\Controllers;

use App\Models\KategoriObat;
use Illuminate\Http\Request;

class KategoriObatController extends Controller
{
    public function index()
    {
        $kategoris = KategoriObat::all();
        return view('kategoriobat.index', compact('kategoris'));
    }

    public function create()
    {
        return view('kategoriobat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        KategoriObat::create($request->only('nama_kategori'));

        return redirect()->route('kategoriobat.index')->with('success', 'Kategori obat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Gunakan findOrFail untuk memastikan error jika ID tidak ada
        $kategoriObat = KategoriObat::findOrFail($id);

        return view('kategoriobat.edit', compact('kategoriObat'));
    }

    public function update(Request $request, $id)
    {
        $kategoriObat = KategoriObat::findOrFail($id);

        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategoriObat->update($request->only('nama_kategori'));

        return redirect()->route('kategoriobat.index')->with('success', 'Kategori obat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kategoriObat = KategoriObat::findOrFail($id);
        $kategoriObat->delete();

        return redirect()->route('kategoriobat.index')->with('success', 'Kategori obat berhasil dihapus.');
    }
}
