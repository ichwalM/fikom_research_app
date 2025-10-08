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
        'program_studi_id',
        'nidn_nip',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'nomor_telepon',
        'alamat_domisili',
        'foto_profil',
        'sinta_id',
        'google_scholar_id',
        'npwp',
        'nama_wajib_pajak',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Relasi ke Program Studi.
     */
    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class);
    }

    /**
     * Relasi ke data Kepegawaian.
     */
    public function kepegawaian()
    {
        return $this->hasOne(Kepegawaian::class);
    }

    /**
     * Relasi ke data Statistik.
     */
    public function statistic()
    {
        return $this->hasOne(DosenStatistic::class);
    }
}
