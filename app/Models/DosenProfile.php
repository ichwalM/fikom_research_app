<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class DosenProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nidn_nip',
        'tempat_lahir',
        'tanggal_lahir',
        'nomor_telepon',
        'alamat_domisili',
        'npwp', 
        'nama_wajib_pajak', 
        'sinta_id',
        'google_scholar_id',
        'foto_profil',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
