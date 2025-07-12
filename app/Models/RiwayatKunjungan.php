<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatKunjungan extends Model
{
    use HasFactory;
    protected $fillable = ['siswa_id', 'petugas_id', 'tanggal', 'keluhan', 'tindakan'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'user_id');
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'petugas_id');
    }
}
