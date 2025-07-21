<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $fillable = ['nama_kelas'];

    public function jadwal_pemeriksaan()
    {
        return $this->hasMany(JadwalPemeriksaan::class);
    }
    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
