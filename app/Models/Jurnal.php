<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    protected $fillable = [
        'user_id',
        'judul_artikel',
        'nama_jurnal',
        'tahun_terbit',
        'volume',
        'nomor',
        'halaman',
        'url_publikasi',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
