<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepegawaian extends Model
{
    use HasFactory;

    protected $table = 'kepegawaian';
    
    protected $fillable = [
        'dosen_profile_id',
        'status_inpassing',
        'nomor_sk_inpassing',
        'tanggal_sk_inpassing',
        'jabatan_fungsional_terakhir',
        'nomor_sk_jabfung',
        'tanggal_sk_jabfung',
        'pangkat_terakhir',
        'nomor_sk_pangkat',
        'tanggal_sk_pangkat',
    ];
    
    public function dosenProfile(){
        return $this->belongsTo(DosenProfile::class);
    }
}
