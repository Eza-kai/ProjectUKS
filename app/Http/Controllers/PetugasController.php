<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\User;
use App\Models\LogAktivitas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Tampilkan semua petugas.
     */
    public function index()
    {
        $petugas = Petugas::with('user')->get();
        return view('backend.petugas.index', compact('petugas'));
    }

    /**
     * Tampilkan form tambah petugas.
     */
    public function create()
    {
        $user = User::all();
        return view('backend.petugas.create', compact('user'));
    }

    /**
     * Simpan data petugas baru.
     */
    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'no_hp' => 'required|string|max:15',
        ]);

        Petugas::create([
            'nama' => $request->nama,
            'user_id' => $request->user_id,
            'no_hp' => $request->no_hp,
        ]);

         LogAktivitas::create([
    'user_id' => auth()->id(),
    'aksi' => 'Menambah',
    'keterangan' => 'Menambah data petugas'
]);

        return redirect()->route('admin.petugas.index')->with('success', 'Data petugas berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail petugas.
     */
    public function show($id)
    {
        $petugas = Petugas::with('user')->findOrFail($id);
        return view('backend.petugas.show', compact('petugas'));
    }

    /**
     * Tampilkan form edit petugas.
     */
    public function edit($id)
    {
        $petugas = Petugas::findOrFail($id);
        $user = User::all();
        return view('backend.petugas.edit', compact('petugas', 'user'));
    }

    /**
     * Update data petugas.
     */
    public function update(Request $request, $id)
    {    
        
        $request->validate([
            'nama' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'no_hp' => 'required|string|max:15',
        ]);

        $petugas = Petugas::findOrFail($id);
        $petugas->nama = $request->nama;
        $petugas->user_id = $request->user_id;
        $petugas->no_hp = $request->no_hp;
        $petugas->save();
        LogAktivitas::create([
    'user_id' => auth()->id(),
    'aksi' => 'Mengubah',
    'keterangan' => 'Mengubah data petugas: ' . $petugas->nama
]);

        return redirect()->route('admin.petugas.index')->with('success', 'Data petugas berhasil diperbarui.');
    }

    /**
     * Hapus petugas.
     */
    public function destroy($id)
    {
        LogAktivitas::create([
    'user_id' => auth()->id(),
    'aksi' => 'Menghapus',
    'keterangan' => 'Menghapus data petugas: ' . $petugas->nama
]);
        $petugas = Petugas::findOrFail($id);
        $petugas->delete();

        return redirect()->route('admin.petugas.index')->with('success', 'Data petugas berhasil dihapus.');
    }
}
