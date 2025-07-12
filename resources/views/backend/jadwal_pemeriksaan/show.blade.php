@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <h3>Detail Jadwal Pemeriksaan</h3>

    <div class="card">
        <div class="card-header bg-primary text-white">
            Jadwal Pemeriksaan #{{ $jadwal->id }}
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Tanggal Pemeriksaan</th>
                    <td>{{ $jadwal->tanggal->format('d M Y') }}</td>
                </tr>
                <tr>
                    <th>Kelas</th>
                    <td>{{ $jadwal->kelas->nama_kelas ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Petugas</th>
                    <td>{{ $jadwal->petugas->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Keterangan</th>
                    <td>{{ $jadwal->keterangan }}</td>
                </tr>
            </table>

            <a href="{{ route('admin.jadwal_pemeriksaan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </div>
</div>
@endsection
