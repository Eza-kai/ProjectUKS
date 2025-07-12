@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <h3>Data Obat</h3>
    <a href="{{ route('admin.obat.create') }}" class="btn btn-primary mb-3">+ Tambah Obat</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Obat</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Tanggal Kadaluwarsa</th>
                <th>Unit</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($obat as $data)
            <tr>
                <td>{{ $data->nama_obat }}</td>
                <td>{{ $data->kategori }}</td>
                <td>{{ $data->stok }}</td>
                <td>{{ $data->tanggal_kadaluarsa }}</td>
                <td>{{ $data->unit }}</td>
                <td>{{ $data->deskripsi }}</td>
                <td>
                    <a href="{{ route('admin.obat.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.obat.destroy', $data->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
