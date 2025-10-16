<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penelitian extends Model
{
    use HasFactory;

    protected $table = 'penelitian';

    protected $fillable = [
        'user_id',
        'skema_penelitian_id',
        'judul',
        'sumber_dana',
        'jumlah_dana',
        'tahun',
        'keterlibatan_mahasiswa',
        'nama_mahasiswa',
        'kesesuaian_roadmap',
        'kesesuaian_topik_infokom',
        'kesesuaian_topik_infokom',
        'mendapatkan_hki',
        'link_kontrak_penelitian',
        'matakuliah',
        'keterangan',
        'status_peneliti',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function skemaPenelitian()
    {
        return $this->belongsTo(SkemaPenelitian::class, 'skema_penelitian_id');
    }
}
