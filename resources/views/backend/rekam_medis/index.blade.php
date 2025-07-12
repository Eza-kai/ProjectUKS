@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <h3>Data Rekam Medis</h3>
    <a href="{{ route('admin.rekam_medis.create') }}" class="btn btn-primary mb-3">+ Tambah</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Siswa</th>
                <th>Tanggal</th>
                <th>Keluhan</th>
                <th>Tindakan</th>
                <th>Obat</th>
                <th>Petugas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rekam as $data)
            <tr>
                <td>{{ $data->siswa->user->name }}</td>
                <td>{{ $data->tanggal }}</td>
                <td>{{ $data->keluhan }}</td>
                <td>{{ $data->tindakan }}</td>
                <td>{{ $data->obat->nama_obat }}</td>
                <td>{{ $data->petugas->nama }}</td>
                <td>
                    <a href="{{ route('admin.rekam_medis.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.rekam_medis.destroy', $data->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin?')">
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
