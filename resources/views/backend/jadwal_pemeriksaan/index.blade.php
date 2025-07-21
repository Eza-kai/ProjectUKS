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
    <h3 class="mb-3">Jadwal Pemeriksaan</h3>

    <a href="{{ route('admin.jadwal_pemeriksaan.create') }}" class="btn btn-primary mb-3">+ Tambah</a>

    <div class="table-responsive" style="width: 180%;">
        <table class="table table-bordered table-striped w-100" id="jadwalTable">
            <thead class="bg-light text-dark text-center">
                <tr>
                    <th>Tanggal</th>
                    <th>Kelas</th>
                    <th>Petugas</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($jadwal as $data)
                <tr>
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ $data->kelas->nama_kelas }}</td>
                    <td>{{ $data->petugas->nama }}</td>
                    <td>{{ $data->keterangan }}</td>
                    <td>
                        <a href="{{ route('admin.jadwal_pemeriksaan.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.jadwal_pemeriksaan.destroy', $data->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin?')">
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
    new DataTable('#jadwalTable');
</script>
@endpush
