@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-13">
            <div class="card w-10">
                <div class="card-header bg-primary text-white">
                    Tambah Siswa
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.siswa.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="user_id" class="form-label">User</label>
                            <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                                <option value="">-- Pilih User --</option>
                                @foreach($user as $u)
                                    <option value="{{ $u->id }}" {{ old('user_id') == $u->id ? 'selected' : '' }}>
                                        {{ $u->name }} - {{ $u->email }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas</label>
                            <select name="kelas" class="form-control @error('kelas') is-invalid @enderror">
                                <option value="">-- Pilih Kelas --</option>
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id }}" {{ old('kelas') == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama_kelas }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kelas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
