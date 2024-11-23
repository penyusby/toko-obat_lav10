@extends('main')

@section('content')
<div class="container">
    <h1>Tambah Kategori Obat</h1>

    <form action="{{ route('kategoriobat.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_kategori">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-2">Simpan</button>
    </form>
</div>
@endsection