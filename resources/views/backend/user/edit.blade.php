@extends('layouts.backend')
@section('content')
<div class="container">
    <h3>Edit User</h3>
    <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control" required>
                <option value="admin" @selected($user->role == 'admin')>Admin</option>
                <option value="petugas" @selected($user->role == 'petugas')>Petugas</option>
                <option value="siswa" @selected($user->role == 'siswa')>Siswa</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Password Baru (opsional)</label>
            <input type="password" name="password" class="form-control">
        </div>
        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
