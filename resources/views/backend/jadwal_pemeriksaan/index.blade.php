@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <h3>Jadwal Pemeriksaan</h3>
    <a href="{{ route('admin.jadwal_pemeriksaan.create') }}" class="btn btn-primary mb-3">+ Tambah</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kelas</th>
                <th>Petugas</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwal as $data)
            <tr>
                <td>{{ $data->tanggal }}</td>
                <td>{{ $data->kelas->nama_kelas }}</td>
                <td>{{ $data->petugas->nama }}</td>
                <td>{{ $data->keterangan }}</td>
                <td>
                    <a href="{{ route('admin.jadwal_pemeriksaan.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.jadwal_pemeriksaan.destroy', $data->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin?')">
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
