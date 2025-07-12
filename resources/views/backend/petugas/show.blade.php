@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <h3>Detail Petugas</h3>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nama</th>
                    <td>{{ $petugas->nama }}</td>
                </tr>
                <tr>
                    <th>User</th>
                    <td>{{ $petugas->user->name }} - {{ $petugas->user->email }}</td>
                </tr>
                <tr>
                    <th>No HP</th>
                    <td>{{ $petugas->no_hp }}</td>
                </tr>
            </table>
            <a href="{{ route('admin.petugas.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
