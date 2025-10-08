<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Pengabdian extends Model
{
    use HasFactory;

    protected $table = 'pengabdian';

    protected $fillable = [
        'user_id',
        'judul_kegiatan',
        'sumber_dana',
        'jumlah_dana',
        'tahun',
    ];

    /**
     * Relasi ke User (pemilik pengabdian).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
