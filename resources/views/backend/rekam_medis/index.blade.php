@extends('layouts.backend')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">
<style>
    table.table th,
    table.table td {
        border: 2px solid #dee2e6 !important;
    }
</style>
@endsection

@section('content')
<div class="container py-3">
    <h3 class="mb-3">Data Rekam Medis</h3>

    <a href="{{ route('admin.rekam_medis.create') }}" class="btn btn-primary mb-3">+ Tambah</a>
    

    <div class="table-responsive" style="width: 130%;">
        <table class="table table-bordered table-striped w-100" id="rekamTable">
            <thead class="bg-light text-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Kelas</th>
                    <th>Siswa</th>
                    <th>Tanggal</th>
                    <th>Keluhan</th>
                    <th>Tindakan</th>
                    <th>Obat</th>
                    <th>Petugas</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($rekam as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->siswa->kelas->nama_kelas  }}</td>
                    <td>{{ $data->siswa->user->name }}</td>
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ $data->keluhan }}</td>
                    <td>{{ $data->tindakan }}</td>
                    <td>{{ $data->obat->nama_obat }}</td>
                    <td>{{ $data->petugas->nama }}</td>
                    <td>
                        @if ($data->status == 'Berobat')
                        <span class="badge bg-warning text-dark">Berobat</span>
                        @elseif($data->status == 'Sembuh')
                        <span class="badge bg-success">Sembuh</span>
                        @else
                        <span class="badge bg-danger">Pulang</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.rekam_medis.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.rekam_medis.destroy', $data->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>
<script>
    new DataTable('#rekamTable');
</script>
@endpush
