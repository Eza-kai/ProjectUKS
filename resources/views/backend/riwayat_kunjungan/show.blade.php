@extends('layouts.backend')

@section('content')
<div class="container-fluid">
    <h3>Detail Riwayat Kunjungan</h3>

    <div class="mb-3">
        <strong>Nama Siswa:</strong> {{ $riwayat->siswa->user->name ?? '-' }}
    </div>

    <div class="mb-3">
        <strong>Petugas:</strong> {{ $riwayat->petugas->nama ?? '-' }}
    </div>

    <div class="mb-3">
        <strong>Tanggal:</strong> {{ $riwayat->tanggal }}
    </div>

    <div class="mb-3">
        <strong>Keluhan:</strong> {{ $riwayat->keluhan }}
    </div>

    <div class="mb-3">
        <strong>Tindakan:</strong> {{ $riwayat->tindakan }}
    </div>
    <a href="{{ route('admin.riwayat_kunjungan.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
