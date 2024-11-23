@extends('main')

@section('content')
<div class="container">
    <h1>Edit Obat</h1>

    <form action="{{ route('dataobat.update', $dataObat->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_obat">Nama Obat</label>
            <input type="text" name="nama_obat" class="form-control" value="{{ $dataObat->nama_obat }}" required>
        </div>

        <div class="form-group">
            <label for="golongan_obat">Golongan Obat</label>
            <select name="golongan_obat" class="form-control" required>
                <option value="Obat Bebas" {{ $dataObat->golongan_obat == 'Obat Bebas' ? 'selected' : '' }}>Obat Bebas
                </option>
                <option value="Obat Bebas Terbatas"
                    {{ $dataObat->golongan_obat == 'Obat Bebas Terbatas' ? 'selected' : '' }}>Obat Bebas Terbatas
                </option>
                <option value="Obat Keras" {{ $dataObat->golongan_obat == 'Obat Keras' ? 'selected' : '' }}>Obat Keras
                </option>
                <option value="Obat Psikotropika dan Narkotika"
                    {{ $dataObat->golongan_obat == 'Obat Psikotropika dan Narkotika' ? 'selected' : '' }}>Obat
                    Psikotropika dan Narkotika</option>
            </select>
        </div>

        <div class="form-group">
            <label for="kategori_id">Kategori</label>
            <select name="kategori_id" class="form-control" required>
                @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}" {{ $dataObat->kategori_id == $kategori->id ? 'selected' : '' }}>
                    {{ $kategori->nama_kategori }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="kadaluwarsa">Kadaluwarsa</label>
            <input type="date" name="kadaluwarsa" class="form-control" value="{{ $dataObat->kadaluwarsa }}" required>
        </div>

        <div class="form-group">
            <label for="produsen">Produsen</label>
            <input type="text" name="produsen" class="form-control" value="{{ $dataObat->produsen }}" required>
        </div>

        <div class="form-group">
            <label for="harga_satuan">Harga Satuan</label>
            <input type="number" name="harga_satuan" class="form-control" value="{{ $dataObat->harga_satuan }}"
                required>
        </div>

        <div class="form-group">

            <label for="stok">Stok</label>
            <input type="number" name="stok" class="form-control" value="{{ $dataObat->stok }}" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
</div>
@endsection