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
    <h3 class="mb-3">Data Obat</h3>

    <a href="{{ route('admin.obat.create') }}" class="btn btn-primary mb-3">+ Tambah Obat</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive" style="width: 150%;">
        <table class="table table-bordered table-striped w-100" id="dataproduct">
            <thead class="bg-light text-dark text-center">
                <tr>
                    <th>Nama Obat</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Tanggal Kadaluwarsa</th>
                    <th>Unit</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($obat as $data)
                <tr>
                    <td>{{ $data->nama_obat }}</td>
                    <td>{{ $data->kategori }}</td>
                    <td>{{ $data->stok }}</td>
                    <td>{{ $data->tanggal_kadaluarsa }}</td>
                    <td>{{ $data->unit }}</td>
                    <td>{{ $data->deskripsi }}</td>
                    <td>
                        <a href="{{ route('admin.obat.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.obat.destroy', $data->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin?')">
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
    new DataTable('#dataproduct');
</script>
@endpush
