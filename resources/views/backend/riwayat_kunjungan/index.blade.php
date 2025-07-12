@extends('layouts.backend')

@section('content')
<div class="container-fluid">
    <h3>Data Riwayat Kunjungan</h3>
    <a href="{{ route('admin.riwayat_kunjungan.create') }}" class="btn btn-primary mb-3">+ Tambah Riwayat</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Siswa</th>
                <th>Petugas</th>
                <th>Tanggal</th>
                <th>Keluhan</th>
                <th>Tindakan</th>              
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($riwayat as $data)
            <tr>
                <td>{{ $data->siswa->user->name ?? '-' }}</td>
                <td>{{ $data->petugas->nama ?? '-' }}</td>
                <td>{{ $data->tanggal }}</td>
                <td>{{ $data->keluhan }}</td>
                <td>{{ $data->tindakan }}</td>        
                <td>
                    <a href="{{ route('admin.riwayat_kunjungan.show', $data->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('admin.riwayat_kunjungan.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.riwayat_kunjungan.destroy', $data->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
