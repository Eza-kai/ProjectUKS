@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <h3>Edit Petugas</h3>
    <form action="{{ route('admin.petugas.update', $petugas->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Petugas</label>
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $petugas->nama) }}">
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                <option value="">-- Pilih User --</option>
                @foreach($user as $data)
                <option value="{{ $data->id }}" {{ old('user_id', $petugas->user_id) == $data->id ? 'selected' : '' }}>
                    {{ $data->name }}
                </option>
                @endforeach
            </select>
            @error('user_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>    
        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp', $petugas->no_hp) }}">
            @error('no_hp')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 text-end">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.petugas.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
