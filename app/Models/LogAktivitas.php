<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class LogAktivitas extends Model
{
    use HasFactory;
    protected $table = 'log_aktivitas'; // nama tabel di database

    protected $fillable = [
        'user_id',
        'aksi',
        'keterangan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
