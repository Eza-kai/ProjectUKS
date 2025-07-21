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
    <h3 class="mb-3">Data Riwayat Kunjungan</h3>

    <a href="{{ route('admin.riwayat_kunjungan.create') }}" class="btn btn-primary mb-3">+ Tambah Riwayat</a>

    <div class="table-responsive" style="width: 180%;">
        <table class="table table-bordered table-striped w-100" id="riwayatTable">
            <thead class="bg-light text-dark text-center">
                <tr>
                    <th>Siswa</th>
                    <th>Petugas</th>
                    <th>Tanggal</th>
                    <th>Keluhan</th>
                    <th>Tindakan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($riwayat as $data)
                <tr>
                    <td>{{ $data->siswa->user->name ?? '-' }}</td>
                    <td>{{ $data->petugas->nama ?? '-' }}</td>
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ $data->keluhan }}</td>
                    <td>{{ $data->tindakan }}</td>
                    <td>
                        <a href="{{ route('admin.riwayat_kunjungan.show', $data->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('admin.riwayat_kunjungan.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.riwayat_kunjungan.destroy', $data->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            @method('DELETE')
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
    new DataTable('#riwayatTable');
</script>
@endpush
