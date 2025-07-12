<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Tampilkan semua data kelas
     */
    public function index()
    {
        $kelas = Kelas::all();
        return view('backend.kelas.index', compact('kelas'));
    }

    /**
     * Tampilkan form tambah kelas
     */
    public function create()
    {
        return view('backend.kelas.create');
    }

    /**
     * Simpan data kelas baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|unique:kelas',
        ]);

        $kelas = new Kelas();
        $kelas->nama_kelas = $request->nama_kelas;

        $kelas->save();
        return redirect()->route('admin.kelas.index')->with('success', 'Data kelas berhasil ditambahkan');
    }

    /**
     * Tampilkan form edit kelas
     */
    public function edit($id)
    {
        return view('backend.kelas.edit', compact('kelas'));
    }

    /**
     * Update data kelas
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required|unique:kelas,nama_kelas,' . $kelas->id,
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->nama_kelas = $request->nama_kelas;

        $kelas->save();
        return redirect()->route('admin.kelas.index')->with('success', 'Data kelas berhasil diperbarui');
    }

    /**
     * Hapus data kelas
     */
    public function destroy($id)
    {
        $kelas->delete();
        return redirect()->route('backend.kelas.index')->with('success', 'Data kelas berhasil dihapus');
    }

    public function show($id)
    {
        return view('backend.kelas.show', compact('kelas'));
    }
}