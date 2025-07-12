@extends('layouts.backend')
@section('content')
<div class="container">
    <h3>Detail User</h3>
    <ul class="list-group">
        <li class="list-group-item"><strong>Nama:</strong> {{ $user->name }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
        <li class="list-group-item"><strong>Role:</strong> {{ $user->role }}</li>
    </ul>
</div>
@endsection
