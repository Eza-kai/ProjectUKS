<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    protected $fillable = ['nama_obat', 'kategori', 'stok', 'tanggal_kadaluarsa', 'unit', 'deskripsi'];
    
    public function rekam_medis()
    {
        return $this->hasMany(RekamMedis::class);
    }
}
