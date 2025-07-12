<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use App\Models\Siswa;
use App\Models\Petugas;
use App\Models\Obat;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    public function index()
    {
        $rekam = RekamMedis::with(['siswa.user', 'petugas', 'obat'])->get();
        return view('backend.rekam_medis.index', compact('rekam'));
    }

    public function create()
    {
        $siswa = Siswa::with('user')->get();
        $petugas = Petugas::all();
        $obat = Obat::all();
        return view('backend.rekam_medis.create', compact('siswa', 'petugas', 'obat'));
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
            'status' => 'required',
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
        
        return redirect()->route('admin.rekam.index')->with('success', 'Rekam medis berhasil ditambahkan.');
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
            'status' => 'required',
        ]);

        $rekam = RekamMedis::findOrFail();
        $rekam->siswa_id = $request->siswa_id;
        $rekam->tanggal = $request->tanggal;
        $rekam->keluhan = $request->keluhan;
        $rekam->tindakan = $request->tindakan;
        $rekam->obat_id = $request->obat_id;
        $rekam->petugas_id = $request->petugas_id;
        $rekam->status = $request->status;

        $rekam->save();
        
        return redirect()->route('admin.rekam.index')->with('success', 'Rekam medis berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $rekam->delete();
        return redirect()->route('backend.rekam.index')->with('success', 'Rekam medis berhasil dihapus.');
    }

    public function show($id)
    {
        return view('backend.rekam_medis.show', compact('rekam'));
    }
}