@extends('main')

@section('content')
<div class="container">
    <h1>Tambah Obat</h1>

    <form action="{{ route('dataobat.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_obat">Nama Obat</label>
            <input type="text" name="nama_obat" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="golongan_obat">Golongan Obat</label>
            <select name="golongan_ob at" class="form-control" required>
                <option value="" selected disabled>Pilih Golongan Obat</option>
                <option value="Obat Bebas">Obat Bebas</option>
                <option value="Obat Bebas Terbatas">Obat Bebas Terbatas</option>
                <option value="Obat Keras">Obat Keras</option>
                <option value="Obat Psikotropika dan Narkotika">Obat Psikotropika dan Narkotika</option>
            </select>
        </div>
        <div class="form-group">
            <label for="kategori_id">Kategori</label>
            <select name="kategori_id" class="form-control" required>
                <option value="" selected disabled>Pilih Kategori</option>
                @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="kadaluwarsa">Kadaluwarsa</label>
            <input type="date" name="kadaluwarsa" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="produsen">Produsen</label>
            <input type="text" name="produsen" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="harga_satuan">Harga Satuan</label>
            <input type="number" name="harga_satuan" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" name="stok" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Simpan</button>
    </form>
</div>
@endsection