@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <h3>Detail Rekam Medis</h3>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Siswa</th>
                    <td>{{ $rekam_medis->siswa->user->name }}</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{ $rekam_medis->tanggal }}</td>
                </tr>
                <tr>
                    <th>Keluhan</th>
                    <td>{{ $rekam_medis->keluhan }}</td>
                </tr>
                <tr>
                    <th>Tindakan</th>
                    <td>{{ $rekam_medis->tindakan }}</td>
                </tr>
                <tr>
                    <th>Obat</th>
                    <td>{{ $rekam_medis->obat->nama_obat }}</td>
                </tr>
                <tr>
                    <th>Petugas</th>
                    <td>{{ $rekam_medis->petugas->nama }}</td>
                </tr>
            </table>
            <a href="{{ route('admin.rekam_medis.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
