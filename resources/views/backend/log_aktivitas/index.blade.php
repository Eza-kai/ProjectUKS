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
    <h3 class="mb-4">Log Aktivitas</h3>

    <form method="GET" class="row g-3 mb-4">
        <div class="col-md-3">
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_awal" class="form-control" value="{{ request('tanggal_awal') }}">
        </div>
        <div class="col-md-3">
            <label>Tanggal Akhir</label>
            <input type="date" name="tanggal_akhir" class="form-control" value="{{ request('tanggal_akhir') }}">
        </div>
        <div class="col-md-3">
            <label>Nama Pengguna</label>
            <select name="user_id" class="form-control">
                <option value="">Semua Pengguna</option>
                @foreach(\App\Models\User::all() as $user)
                    <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 d-flex align-items-end flex-wrap gap-2">
    <button class="btn btn-primary" type="submit">Filter</button>
    <a href="{{ route('admin.log_aktivitas.index') }}" class="btn btn-secondary">Reset</a>
    <a href="{{ route('admin.log_aktivitas.export') }}"
       class="btn btn-danger"
       onclick="event.preventDefault(); document.getElementById('export-form').submit();">
       Export PDF
    </a>
</div>

    </form>

    <form id="export-form" action="{{ route('admin.log_aktivitas.export') }}" method="GET" style="display: none;">
        <input type="hidden" name="tanggal_awal" value="{{ request('tanggal_awal') }}">
        <input type="hidden" name="tanggal_akhir" value="{{ request('tanggal_akhir') }}">
        <input type="hidden" name="user_id" value="{{ request('user_id') }}">
    </form>

    <div class="table-responsive" style="width: 180%;">
        <table class="table table-bordered table-striped w-100" id="logTable">
            <thead class="bg-light text-dark text-center">
                <tr>
                    <th>Waktu</th>
                    <th>Nama Pengguna</th>
                    <th>Aksi</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                <tr>
                    <td>{{ $log->created_at->format('d-m-Y H:i') }}</td>
                    <td>{{ $log->user->name ?? '-' }}</td>
                    <td>{{ $log->aksi }}</td>
                    <td>{{ $log->keterangan }}</td>
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
    new DataTable('#logTable');
</script>
@endpush
