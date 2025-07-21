<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\LogAktivitas;

class LogAktivitasController extends Controller
{
    public function exportPdf(Request $request)
{
    $query = LogAktivitas::with('user')->latest();

    if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
        $query->whereBetween('created_at', [
            $request->tanggal_awal . ' 00:00:00',
            $request->tanggal_akhir . ' 23:59:59'
        ]);
    }

    if ($request->filled('user_id')) {
        $query->where('user_id', $request->user_id);
    }

    $logs = $query->get();

    $pdf = Pdf::loadView('backend.log_aktivitas.pdf', compact('logs'));
    return $pdf->download('log-aktivitas.pdf');
}

    public function index(Request $request)
{
    $query = LogAktivitas::with('user')->latest();

    if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
        $query->whereBetween('created_at', [
            $request->tanggal_awal . ' 00:00:00',
            $request->tanggal_akhir . ' 23:59:59'
        ]);
    }

    if ($request->filled('user_id')) {
        $query->where('user_id', $request->user_id);
    }

    $logs = $query->get();

    return view('backend.log_aktivitas.index', compact('logs'));
}


}