@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <h3>Edit Obat</h3>
    <form action="{{ route('admin.obat.update', $obat->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Obat</label>
            <input type="text" name="nama_obat" value="{{ old('nama_obat', $obat->nama_obat) }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <input type="text" name="kategori" value="{{ old('kategori', $obat->kategori) }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" value="{{ old('stok', $obat->stok) }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Tanggal Kadaluwarsa</label>
            <input type="date" name="tanggal_kadaluarsa" value="{{ old('tanggal_kadaluarsa', $obat->tanggal_kadaluarsa) }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Unit</label>
            <input type="text" name="unit" value="{{ old('unit', $obat->unit) }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $obat->deskripsi) }}</textarea>
        </div>
        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.obat.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
