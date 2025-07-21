<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use App\Models\Siswa;
use App\Models\Petugas;
use App\Models\Obat;
use App\Models\Kelas;
use App\Models\LogAktivitas;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class RekamMedisController extends Controller
{
    public function exportPdf(Request $request)
{
    
    $query = RekamMedis::with(['siswa.user', 'siswa.kelas', 'petugas', 'obat']);

    if ($request->has('status') && $request->status != '') {
        $query->where('status', $request->status);
    }

    $rekam = $query->get();

    $pdf = Pdf::loadView('backend.rekam_medis.pdf', compact('rekam'))
             ->setPaper('A4', 'landscape');

    return $pdf->download('laporan_rekam_medis.pdf');
}

    public function laporan(Request $request)
{
    $awal = $request->tanggal_awal;
    $akhir = $request->tanggal_akhir;

    $rekam = RekamMedis::with('siswa.kelas')
        ->when($awal && $akhir, function ($query) use ($awal, $akhir) {
            $query->whereBetween('tanggal', [$awal, $akhir]);
        })
        ->get();

    return view('backend.rekam_medis.laporan', compact('rekam'));
}

    public function index(Request $request)
    {
        $query = RekamMedis::with(['siswa.user', 'siswa.kelas', 'petugas', 'obat']);

    if ($request->has('status') && $request->status != '') {
        $query->where('status', $request->status);
    }

    $rekam = $query->get();

    return view('backend.rekam_medis.index', compact('rekam'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        $siswa = Siswa::with(['user', 'kelas'])->get();
        $petugas = Petugas::all();
        $obat = Obat::all();
        return view('backend.rekam_medis.create', compact('kelas', 'siswa', 'petugas', 'obat'));
    }

    public function store(Request $request)
    {        
        $request->validate([
            'siswa_id' => 'required',
            'tanggal' => 'required|date',
            'keluhan' => 'required',
            'tindakan' => 'required',
            'obat_id' => 'required',
            'petugas_id' => 'required',
            'status' => 'required|in:Berobat,Sembuh,Pulang'
        ]);

        $rekam = new RekamMedis();
        $rekam->siswa_id = $request->siswa_id;
        $rekam->tanggal = $request->tanggal;
        $rekam->keluhan = $request->keluhan;
        $rekam->tindakan = $request->tindakan;
        $rekam->obat_id = $request->obat_id;
        $rekam->petugas_id = $request->petugas_id;
        $rekam->status = $request->status;

        $rekam->save();               
        LogAktivitas::create([
        'user_id' => auth()->id(),
        'aksi' => 'Menambah',
        'keterangan' => 'Menambah data rekam medis untuk siswa ID: ' . $rekam->siswa_id
        ]);

        return redirect()->route('admin.rekam_medis.index')->with('success', 'Rekam medis berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $rekam = RekamMedis::findOrFail($id);
        $siswa = Siswa::with('user')->get();
        $petugas = Petugas::all();
        $obat = Obat::all();
        return view('backend.rekam_medis.edit', compact('rekam', 'siswa', 'petugas', 'obat'));
    }

    public function update(Request $request, $id)
    {                
        $request->validate([
            'siswa_id' => 'required',
            'tanggal' => 'required|date',
            'keluhan' => 'required',
            'tindakan' => 'required',
            'obat_id' => 'required',
            'petugas_id' => 'required',
            'status' => 'required|in:Berobat,Sembuh,Pulang'
        ]);

        $rekam = RekamMedis::findOrFail($id);
        $rekam->siswa_id = $request->siswa_id;
        $rekam->tanggal = $request->tanggal;
        $rekam->keluhan = $request->keluhan;
        $rekam->tindakan = $request->tindakan;
        $rekam->obat_id = $request->obat_id;
        $rekam->petugas_id = $request->petugas_id;
        $rekam->status = $request->status;

        $rekam->save();
        LogAktivitas::create([
    'user_id' => auth()->id(),
    'aksi' => 'Mengubah',
    'keterangan' => 'Mengubah data rekam medis untuk siswa: ' . $rekam->siswa->user->name
]);
        
        return redirect()->route('admin.rekam_medis.index')->with('success', 'Rekam medis berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $rekam = RekamMedis::findOrFail($id);
        LogAktivitas::create([
    'user_id' => auth()->id(),
    'aksi' => 'Menghapus',
    'keterangan' => 'Menghapus data rekam medis untuk siswa: ' . $rekamMedis->siswa->nama
]);
        $rekam = RekamMedis::findOrFail($id);
        $rekam->delete();
        return redirect()->route('admin.rekam_medis.index')->with('success', 'Rekam medis berhasil dihapus.');
    }

    public function show($id)
    {
        $rekam = RekamMedis::findOrFail($id);
        return view('backend.rekam_medis.show', compact('rekam'));
    }
}