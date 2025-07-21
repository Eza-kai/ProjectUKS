<?php

namespace App\Http\Controllers;

use App\Models\JadwalPemeriksaan;
use App\Models\Kelas;
use App\Models\Petugas;
use App\Models\LogAktivitas;
use Illuminate\Http\Request;

class JadwalPemeriksaanController extends Controller
{
    public function index()
    {
        $jadwal = JadwalPemeriksaan::with(['kelas', 'petugas'])->get();
        return view('backend.jadwal_pemeriksaan.index', compact('jadwal'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        $petugas = Petugas::all();
        return view('backend.jadwal_pemeriksaan.create', compact('kelas', 'petugas'));
    }

    public function store(Request $request)
    {
        LogAktivitas::create([
    'user_id' => auth()->id(),
    'aksi' => 'Menambah',
    'keterangan' => 'Menambah jadwal pemeriksaan'
]);
        $request->validate([
            'tanggal' => 'required|date',
            'kelas_id' => 'required',
            'petugas_id' => 'required',
            'keterangan' => 'nullable',
        ]);

        $jadwal = new JadwalPemeriksaan();
        $jadwal->tanggal = $request->tanggal;
        $jadwal->kelas_id = $request->kelas_id;
        $jadwal->petugas_id = $request->petugas_id;
        $jadwal->keterangan = $request->keterangan;

        $jadwal->save();
        return redirect()->route('admin.jadwal_pemeriksaan.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jadwal = JadwalPemeriksaan::findOrFail($id);
        $kelas = Kelas::all();
        $petugas = Petugas::all();
        return view('backend.jadwal_pemeriksaan.edit', compact('jadwal', 'kelas', 'petugas'));
    }

    public function update(Request $request, $id)
    {
        $jadwal = JadwalPemeriksaan::findOrFail($id);   
        LogAktivitas::create([
    'user_id' => auth()->id(),
    'aksi' => 'Mengubah',
    'keterangan' => 'Mengubah jadwal pemeriksaan tanggal: ' . $jadwal->tanggal
]);
        $request->validate([
            'tanggal' => 'required|date',
            'kelas_id' => 'required',
            'petugas_id' => 'required',
            'keterangan' => 'nullable',
        ]);

        $jadwal = JadwalPemeriksaan::findOrFail($id);
        $jadwal->tanggal = $request->tanggal;
        $jadwal->kelas_id = $request->kelas_id;
        $jadwal->petugas_id = $request->petugas_id;
        $jadwal->keterangan = $request->keterangan;

        $jadwal->save();
        return redirect()->route('admin.jadwal_pemeriksaan.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jadwal = JadwalPemeriksaan::findOrFail($id);
        LogAktivitas::create([
    'user_id' => auth()->id(),
    'aksi' => 'Menghapus',
    'keterangan' => 'Menghapus jadwal pemeriksaan tanggal: ' . $jadwal->tanggal
]);
        $jadwal->delete();
        return redirect()->route('backend.jadwal_pemeriksaan.index')->with('success', 'Jadwal berhasil dihapus.');
    }
    public function show($id)
    {
        return view('backend.jadwal_pemeriksaan.show', compact('jadwal'));
    }
}