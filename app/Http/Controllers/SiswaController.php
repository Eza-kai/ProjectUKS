<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\User;
use App\Models\RekamMedis;
use App\Models\RiwayatKunjungan;
use App\Models\Obat;
use App\Models\LogAktivitas;
use Barryvdh\DomPDF\Facade\Pdf;

class SiswaController extends Controller
{
    public function exportLaporanGabungan()
{
    $siswa = Siswa::with('user')->get();
    $rekam = RekamMedis::with(['siswa.user', 'petugas', 'obat'])->get();
    $riwayat = RiwayatKunjungan::with(['siswa.user', 'petugas'])->get();
    $obat = Obat::all();

    $pdf = Pdf::loadView('backend.siswa.laporan_gabungan', compact('siswa', 'rekam', 'riwayat', 'obat'))
        ->setPaper('A4', 'landscape');

    return $pdf->download('laporan_gabungan.pdf');
}
    public function exportPdf()
    {
    $siswa = Siswa::with('user')->get();

    $pdf = Pdf::loadView('backend.siswa.pdf', compact('siswa'))
        ->setPaper('A4', 'portrait');

    return $pdf->download('data_siswa.pdf');    
    }

    public function tampil()
    {
        $siswa = Siswa::with('user', 'kelas')->get();
        return view('backend.siswa.tampil', compact('siswa'));
    }

    public function index()
    {
        $siswa = Siswa::with('user', 'kelas')->get();
        return view('backend.siswa.index', compact('siswa'));
    }

    public function create()
    {
        $user = User::all();
        $kelas = Kelas::all();        
        return view('backend.siswa.create', compact('user', 'kelas'));
    }

    public function store(Request $request)
    {       
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'kelas_id' => 'required|exists:kelas,id',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        $siswa = new Siswa();
        $siswa->user_id = $request->user_id;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->save();

        LogAktivitas::create([
        'user_id' => auth()->id(),
        'aksi' => 'Menambah',
        'keterangan' => 'Menambah data siswa: ' . $siswa->user->name
        ]);
        
        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil ditambahkan');
    }

    public function show($id)
    {
        $siswa = Siswa::with(['user', 'kelas'])->findOrFail($id);
        return view('backend.siswa.show', compact('siswa'));
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);        
        $user = User::all();
        $kelas = Kelas::all();
        return view('backend.siswa.edit', compact('siswa', 'user', 'kelas'));
    }

    public function update(Request $request, $id)
    {        
        $siswa = Siswa::findOrFail($id);       
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'kelas_id' => 'required|exists:kelas,id',
            'jenis_kelamin' => 'required|string|max:15',
        ]);
        $siswa = Siswa::findOrFail($id);
        $siswa->user_id = $request->user_id;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->save();

         LogAktivitas::create([
        'user_id' => auth()->id(),
        'aksi' => 'Mengubah',
        'keterangan' => 'Mengubah data siswa: ' . $siswa->user->name
        ]);
        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil diperbarui');
    }

    public function destroy($id)
    {        
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        LogAktivitas::create([
        'user_id' => auth()->id(),
        'aksi' => 'Menghapus',
        'keterangan' => 'Menghapus data siswa: ' . $siswa->user->name
        ]);

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil dihapus');
    }
    public function getSiswaByKelas($kelas_id)
{
    $siswa = Siswa::where('kelas_id', $kelas_id)->with('user:id,name')->get()->map(function ($s) {
    return [
        'id' => $s->id,
        'nama' => $s->user->name,
        ];
    });
    return response()->json($siswa);
}

}
