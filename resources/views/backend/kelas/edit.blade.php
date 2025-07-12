@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <h3>Edit Data Kelas</h3>
    <form action="{{ route('admin.kelas.update', $kelas->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_kelas">Nama Kelas</label>
            <input type="text" name="nama_kelas" value="{{ old('nama_kelas', $kelas->nama_kelas) }}" class="form-control @error('nama_kelas') is-invalid @enderror">
            @error('nama_kelas')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('admin.kelas.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
