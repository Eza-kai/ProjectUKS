<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obat = Obat::all();
        return view('backend.obat.index', compact('obat'));
    }

    public function create()
    {
        return view('backend.obat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required',
            'kategori' => 'required',
            'stok' => 'required|numeric',
            'tanggal_kadaluarsa' => 'required|date',
            'unit' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $obat = new Obat();
        $obat->nama_obat = $request->nama_obat;
        $obat->kategori = $request->kategori;
        $obat->stok = $request->stok;
        $obat->tanggal_kadaluarsa = $request->tanggal_kadaluarsa;
        $obat->unit = $request->unit;
        $obat->deskripsi = $request->deskripsi;

        $obat->save();

        return redirect()->route('admin.obat.index')->with('success', 'Obat berhasil ditambahkan.');
    }

    public function show($id)
    {
        $obat = Obat::findOrFail($id);
        return view('backend.obat.show', compact('obat'));
    }

    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return view('backend.obat.edit', compact('obat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_obat' => 'required',
            'kategori' => 'required',
            'stok' => 'required|numeric',
            'kadaluarsa' => 'required|date',
            'unit' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $obat = Obat::findOrFail($id);
        $obat->nama_obat = $request->nama_obat;
        $obat->kategori = $request->kategori;
        $obat->stok = $request->stok;
        $obat->tanggal_kadaluarsa = $request->tanggal_kadaluarsa;
        $obat->unit = $request->unit;
        $obat->deskripsi = $request->deskripsi;

        $obat->save();

        return redirect()->route('admin.obat.index')->with('success', 'Obat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();
        return redirect()->route('backend.obat.index')->with('success', 'Obat berhasil dihapus.');
    }
}