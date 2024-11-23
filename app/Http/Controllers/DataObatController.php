<?php

namespace App\Http\Controllers;

use App\Models\DataObat;
use App\Models\KategoriObat;
use Illuminate\Http\Request;

class DataObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataObat = DataObat::with('kategori')->get(); // Mengambil semua data obat beserta kategorinya
        return view('dataobat.index', ['dataObat' => $dataObat]); // Sesuaikan nama view sesuai dengan folder dan nama file
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = KategoriObat::all(); // Ambil semua kategori untuk dropdown
        return view('dataobat.create', compact('kategoris')); // Kirim data kategori ke view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'golongan_obat' => 'required|in:Obat Bebas,Obat Bebas Terbatas,Obat Keras,Obat Psikotropika dan Narkotika',
            'kategori_id' => 'required|exists:kategori_obats,id',
            'kadaluwarsa' => 'required|date',
            'produsen' => 'required|string|max:255',
            'harga_satuan' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        DataObat::create($request->all()); // Simpan data obat
        return redirect()->route('dataobat.index')->with('success', 'Data obat berhasil ditambahkan.'); // Redirect dengan pesan sukses
    }

    /**
     * Display the specified resource.
     */
    public function show(DataObat $dataObat)
    {
        return view('dataobat.show', compact('dataObat')); // Tampilkan detail obat
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataObat $dataObat, $id)
    {
        $dataObat = DataObat::findOrFail($id);
        $kategoris = KategoriObat::all(); // Jika ada relasi kategori
        return view('dataobat.edit', compact('dataObat', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataObat $dataObat, $id)
    {
        $request->validate([
            'nama_obat' => 'required|string',
            'golongan_obat' => 'required|string',
            'kategori_id' => 'required|integer',
            'kadaluwarsa' => 'required|date',
            'produsen' => 'required|string',
            'harga_satuan' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        // Cari data obat berdasarkan ID
        $dataObat = DataObat::findOrFail($id);

        // Update data obat
        $dataObat->update($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('dataobat.index')->with('success', 'Data Obat berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataObat $dataObat, $id)

    {
        $dataObat = DataObat::findOrFail($id);
        $dataObat->delete();

        return redirect()->route('dataobat.index')->with('success', 'Data Obat berhasil dihapus!');
    }
}
