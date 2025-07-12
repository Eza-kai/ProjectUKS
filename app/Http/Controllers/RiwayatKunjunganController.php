<?php

namespace App\Http\Controllers;

use App\Models\RiwayatKunjungan;
use App\Models\Siswa;
use App\Models\Petugas;
use Illuminate\Http\Request;

class RiwayatKunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riwayat = RiwayatKunjungan::with(['siswa.user', 'petugas'])->get();
        return view('backend.riwayat_kunjungan.index', compact('riwayat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswa::with('user')->get(); // siswa.user.name
        $petugas = Petugas::all(); // petugas.name
        return view('backend.riwayat_kunjungan.create', compact('siswa', 'petugas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'siswa_id' => 'required|exists:siswas,user_id',
        'petugas_id' => 'required|exists:petugas,id',
        'tanggal' => 'required|date',
        'keluhan' => 'required|string',
        'tindakan' => 'required|string',
    ]);

    $riwayat = new RiwayatKunjungan();
    $riwayat->siswa_id = $request->siswa_id;
    $riwayat->petugas_id = $request->petugas_id;
    $riwayat->tanggal = $request->tanggal;
    $riwayat->keluhan = $request->keluhan;
    $riwayat->tindakan = $request->tindakan;
    $riwayat->save();

    return redirect()->route('admin.riwayat_kunjungan.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $riwayat = RiwayatKunjungan::with(['siswa.user', 'petugas'])->findOrFail($id);
        return view('backend.riwayat_kunjungan.show', compact('riwayat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $riwayat = RiwayatKunjungan::findOrFail($id);
        $siswa = Siswa::with('user')->get();
        $petugas = Petugas::all();
        return view('backend.riwayat_kunjungan.edit', compact('riwayat', 'siswa', 'petugas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
            'siswa_id' => 'required|exists:siswas,user_id',
            'petugas_id' => 'required|exists:petugas,id',
            'tanggal' => 'required|date',
            'keluhan' => 'required|string',
            'tindakan' => 'required|string',
        ]);

        $riwayat = RiwayatKunjungan::findOrFail($id);
        $riwayat->siswa_id = $request->siswa_id;
        $riwayat->petugas_id = $request->petugas_id;
        $riwayat->tanggal = $request->tanggal;
        $riwayat->keluhan = $request->keluhan;
        $riwayat->tindakan = $request->tindakan;
        $riwayat->save();

        return redirect()->route('admin.riwayat_kunjungan.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $riwayat = RiwayatKunjungan::findOrFail($id);
        $riwayat->delete();

        return redirect()->route('admin.riwayat_kunjungan.index')->with('success', 'Data berhasil dihapus');
    }
}
