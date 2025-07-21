@extends('layouts.backend')
@section('content')
<div class="container">
    <h3>Detail Kelas</h3>
    <ul class="list-group">
        <li class="list-group-item"><strong>Kelas</strong> {{ $kelas->nama_kelas }}</li>        
    </ul>
</div>
@endsection
