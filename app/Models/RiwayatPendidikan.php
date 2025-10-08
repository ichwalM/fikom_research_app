<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class RiwayatPendidikan extends Model
{
    use HasFactory;
    protected $table = 'riwayat_pendidikan';

    protected $fillable = [
        'user_id',
        'perguruan_tinggi',
        'program_studi',
        'gelar',
        'tahun_lulus',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
