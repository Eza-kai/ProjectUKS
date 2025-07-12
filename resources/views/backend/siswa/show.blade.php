@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <h3>Detail Siswa</h3>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nama</th>
                    <td>{{ $siswa->user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $siswa->user->email }}</td>
                </tr>
                <tr>
                    <th>Kelas</th>
                    <td>{{ $siswa->kelas->nama_kelas }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>{{ $siswa->jenis_kelamin }}</td>
                </tr>
            </table>
            <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
