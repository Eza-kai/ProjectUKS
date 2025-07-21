@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <h3>Edit Rekam Medis</h3>
    <form action="{{ route('admin.rekam_medis.update', $rekam->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Siswa</label>
            <input type="text" name="siswa_id" class="form-control" value="{{ $rekam->siswa->user->name }}">
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $rekam->tanggal }}">
        </div>

        <div class="mb-3">
            <label>Keluhan</label>
            <input type="text" name="keluhan" class="form-control" value="{{ $rekam->keluhan }}">
        </div>

        <div class="mb-3">
            <label>Tindakan</label>
            <input type="text" name="tindakan" class="form-control" value="{{ $rekam->tindakan }}">
        </div>

        <div class="mb-3">
            <label>Obat</label>
            <select name="obat_id" class="form-control">
                @foreach ($obat as $o)
                    <option value="{{ $o->id }}" {{ $rekam->obat_id == $o->id ? 'selected' : '' }}>
                        {{ $o->nama_obat }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Petugas</label>
            <select name="petugas_id" class="form-control">
                @foreach ($petugas as $p)
                    <option value="{{ $p->id }}" {{ $rekam->petugas_id == $p->id ? 'selected' : '' }}>
                        {{ $p->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('admin.rekam_medis.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
