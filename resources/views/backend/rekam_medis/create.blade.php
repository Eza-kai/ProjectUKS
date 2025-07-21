@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <h3>Tambah Rekam Medis</h3>
    <form action="{{ route('admin.rekam_medis.store') }}" method="POST">
        @csrf

       <div class="mb-3">
    <label>Kelas</label>
    <select id="kelas" class="form-control">
        <option value="">Pilih Kelas</option>
        @foreach ($kelas as $k)
            <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="siswa_id" class="form-label">Siswa</label>
    <select name="siswa_id" id="siswa_id" class="form-control">
        <option value="">-- Pilih Siswa --</option>
        @foreach ($siswa as $s)
            <option value="{{ $s->id }}">
                {{ $s->user->name }} ({{ $s->kelas->nama_kelas ?? '-' }})
            </option>
        @endforeach
    </select>
</div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control">
        </div>
        
        <div class="mb-3">
            <label>Keluhan</label>
            <input type="text" name="keluhan" class="form-control">
        </div>

        <div class="mb-3">
            <label>Tindakan</label>
            <input type="text" name="tindakan" class="form-control">
        </div>

        <div class="mb-3">
            <label>Obat</label>
            <select name="obat_id" class="form-control">
                @foreach ($obat as $o)
                    <option value="{{ $o->id }}">{{ $o->nama_obat }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Petugas</label>
            <select name="petugas_id" class="form-control">
                @foreach ($petugas as $p)
                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="Berobat">Berobat</option>
                <option value="Sembuh">Sembuh</option>
                <option value="Pulang">Pulang</option>
            </select>
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>

@section('scripts')
<script>
    document.getElementById('kelas').addEventListener('change', function() {
        var kelasId = this.value;
        var siswaSelect = document.getElementById('siswa');

        // Kosongkan opsi siswa
        siswaSelect.innerHTML = '<option value="">Pilih Siswa</option>';

        if (kelasId) {
            fetch(`/api/siswa/${kelasId}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(siswa => {
                        var option = document.createElement('option');
                        option.value = siswa.id;
                        option.textContent = siswa.user.name;
                        siswaSelect.appendChild(option);
                    });
                });
        }
    });
</script>
@endsection
@endsection