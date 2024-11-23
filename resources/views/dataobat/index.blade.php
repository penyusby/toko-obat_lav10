@extends('main')

@section('content')
<div class="container">
    <h1>Data Obat</h1>
    <a href="{{ route('dataobat.create') }}" class="btn btn-primary">Tambah Obat</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped mt-3">
        <thead class="table">
            <tr>
                <th>No</th>
                <th>Nama Obat</th>
                <th>Golongan Obat</th>
                <th>Kategori</th>
                <th>Kadaluwarsa</th>
                <th>Produsen</th>
                <th>Harga Satuan</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataObat as $obat)
            <tr>
                <td>{{$obat->id}}</td>
                <td>{{ $obat->nama_obat }}</td>
                <td>{{ $obat->golongan_obat }}</td>
                <td>{{ $obat->kategori->nama_kategori }}</td>
                <td>{{ \Carbon\Carbon::parse($obat->kadaluwarsa)->format('d-m-Y') }}</td>
                <td>{{ $obat->produsen }}</td>
                <td>Rp {{ number_format($obat->harga_satuan, 0, ',', '.') }}</td>
                <td>{{ $obat->stok }}</td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="{{ route('dataobat.edit', $obat) }}" class="btn btn-warning btn-sm">Edit</a>

                    <!-- Tombol Hapus -->
                    <form action="{{ route('dataobat.destroy', $obat) }}" method="POST" style="display:inline;">
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