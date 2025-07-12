@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <h3>Data Petugas</h3>
    <a href="{{ route('admin.petugas.create') }}" class="btn btn-primary mb-3">+ Tambah Petugas</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>User</th>
                <th>No HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($petugas as $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->no_hp }}</td>
                <td>
                    <a href="{{ route('admin.petugas.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.petugas.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Yakin?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
