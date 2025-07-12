@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <h3>Tambah Obat</h3>
    <form action="{{ route('admin.obat.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Obat</label>
            <input type="text" name="nama_obat" class="form-control">
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <input type="text" name="kategori" class="form-control">
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control">
        </div>
        <div class="mb-3">
            <label>Tanggal Kadaluwarsa</label>
            <input type="date" name="tanggal_kadaluarsa" class="form-control">
        </div>
        <div class="mb-3">
            <label>Unit</label>
            <input type="text" name="unit" class="form-control">
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
