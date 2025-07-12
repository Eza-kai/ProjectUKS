@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <h3>Tambah Rekam Medis</h3>
    <form action="{{ route('admin.rekam_medis.store') }}" method="POST">
        @csrf
        <div class="mb-3"><label>Siswa</label>
            <input type="text" name="siswa_id" class="form-control" >
        </div>
        <div class="mb-3"><label>Tanggal</label><input type="date" name="tanggal" class="form-control"></div>
        <div class="mb-3"><label>Keluhan</label><input type="text" name="keluhan" class="form-control"></div>
        <div class="mb-3"><label>Tindakan</label><input type="text" name="tindakan" class="form-control"></div>
        <div class="mb-3"><label>Obat</label>
            <select name="obat_id" class="form-control">
                @foreach ($obat as $o) <option value="{{ $o->id }}">{{ $o->nama_obat }}</option> @endforeach
            </select>
        </div>
        <div class="mb-3"><label>Petugas</label>
            <select name="petugas_id" class="form-control">
                @foreach ($petugas as $p) <option value="{{ $p->id }}">{{ $p->nama }}</option> @endforeach
            </select>
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
