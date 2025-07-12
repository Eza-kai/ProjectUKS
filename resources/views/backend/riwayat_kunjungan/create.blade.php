@extends('layouts.backend')

@section('content')
<div class="container-fluid">
    <h3>Tambah Riwayat Kunjungan</h3>
    <form action="{{ route('admin.riwayat_kunjungan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Siswa</label>
            <select name="siswa_id" class="form-control">
                @foreach ($siswa as $data)
                <option value="{{ $data->user_id }}" {{ old('siswa_id') == $data->user_id ? 'selected' : '' }}>
                    {{ $data->user->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Petugas</label>
            <select name="petugas_id" class="form-control">
                @foreach ($petugas as $ptg)
                <option value="{{ $ptg->id }}" {{ old('petugas_id') == $ptg->id ? 'selected' : '' }}>
                    {{ $ptg->nama }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="{{ old('tanggal') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Keluhan</label>
            <textarea name="keluhan" class="form-control">{{ old('keluhan') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Tindakan</label>
            <textarea name="tindakan" class="form-control">{{ old('tindakan') }}</textarea>
        </div>  
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
