<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenStatistic extends Model
{
    use HasFactory;

    protected $table = 'dosen_statistics';

    protected $fillable = [
        'dosen_profile_id',
        'total_sitasi',
        'h_index',
        'i10_index',
    ];

    public function dosenProfile()
    {
        return $this->belongsTo(DosenProfile::class);
    }
}
