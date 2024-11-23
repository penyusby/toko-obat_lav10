@extends('main')

@section('content')
<div class="container">
    <h1>Edit Kategori Obat</h1>

    {{-- Form untuk edit kategori obat --}}
    <form action="{{ route('kategoriobat.update', ['kategoriobat' => $kategoriObat->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_kategori" class="form-label">Nama Kategori Obat</label>
            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control"
                value="{{ $kategoriObat->nama_kategori }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection