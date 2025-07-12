@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <h3>Edit Jadwal Pemeriksaan</h3>
    <form action="{{ route('admin.jadwal_pemeriksaan.update', $jadwal->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="tanggal">Tanggal Pemeriksaan</label>
            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', $jadwal->tanggal) }}">
            @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kelas_id">Kelas</label>
            <select name="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror">
                <option value="">-- Pilih Kelas --</option>
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}" {{ $jadwal->kelas_id == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kelas }}
                    </option>
                @endforeach
            </select>
            @error('kelas_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="petugas_id">Petugas</label>
            <select name="petugas_id" class="form-control @error('petugas_id') is-invalid @enderror">
                <option value="">-- Pilih Petugas --</option>
                @foreach ($petugas as $p)
                    <option value="{{ $p->id }}" {{ $jadwal->petugas_id == $p->id ? 'selected' : '' }}>
                        {{ $p->nama }}
                    </option>
                @endforeach
            </select>
            @error('petugas_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan', $jadwal->keterangan) }}</textarea>
            @error('keterangan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ route('admin.jadwal_pemeriksaan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
