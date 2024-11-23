@extends('main')

@section('content')
<div class="container">
    <h1>Kategori Obat</h1>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('kategoriobat.create') }}" class="btn btn-primary">Tambah Kategori Obat</a>

    <table class="table table-bordered table-striped mt-3">
        <thead class="table">
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategoris as $kategori)
            <tr>
                <td>{{$kategori->id}}</td>
                <td>{{ $kategori->nama_kategori }}</td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="{{ route('kategoriobat.edit', $kategori) }}" class="btn btn-warning btn-sm">Edit</a>

                    <!-- Tombol Hapus -->
                    <form action="{{ route('kategoriobat.destroy', $kategori) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection