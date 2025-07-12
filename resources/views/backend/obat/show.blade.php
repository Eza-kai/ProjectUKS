@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <h3>Detail Obat</h3>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nama Obat</th>
                    <td>{{ $obat->nama_obat }}</td>
                </tr>
                <tr>
                    <th>Kategori</th>
                    <td>{{ $obat->kategori }}</td>
                </tr>
                <tr>
                    <th>Stok</th>
                    <td>{{ $obat->stok }}</td>
                </tr>
                <tr>
                    <th>Tanggal Kadaluwarsa</th>
                    <td>{{ $obat->tanggal_kadaluwarsa }}</td>
                </tr>
                <tr>
                    <th>Unit</th>
                    <td>{{ $obat->unit }}</td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>{{ $obat->deskripsi }}</td>
                </tr>
            </table>
            <a href="{{ route('admin.obat.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
