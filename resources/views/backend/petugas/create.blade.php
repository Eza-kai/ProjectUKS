@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <h3>Tambah Petugas</h3>
    <form action="{{ route('admin.petugas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror">
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>User</label>
            <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                <option value="">-- Pilih User --</option>
                @foreach($user as $data)
                    <option value="{{ $data->id }}" {{ old('user_id') == $data->id ? 'selected' : '' }}>
                        {{ $data->name }} - {{ $data->email }}
                    </option>
                @endforeach
            </select>
            @error('user_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" value="{{ old('no_hp') }}" class="form-control @error('no_hp') is-invalid @enderror">
            @error('no_hp')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.petugas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
