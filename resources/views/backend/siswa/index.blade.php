@extends('layouts.backend')
@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">
@endsection
@section('content')
<div class="container">
    <h3>Data Siswa</h3>
    <a href="{{ route('admin.siswa.create') }}" class="btn btn-primary mb-3">+ Tambah Siswa</a>    



    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User</th>
                <th>Kelas</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $data)
            <tr>
                <td>{{ $data->user->name }}</td>
                <td>{{ $data->kelas }}</td>
                <td>{{ $data->jenis_kelamin }}</td>
                <td>
                    <a href="{{ route('admin.siswa.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('admin.siswa.show', $data->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <form action="{{ route('admin.siswa.destroy', $data->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Yakin mau hapus?')">
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
@endsection
@push('scripts')
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>
<script>
    new DataTable('#dataproduct');
</script>
@endpush