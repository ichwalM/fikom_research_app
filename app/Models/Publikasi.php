<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Publikasi extends Model
{
    use HasFactory;

    protected $table = 'publikasi';

    protected $fillable = [
        'user_id',
        'judul',
        'nama_publikasi',
        'tahun',
        'jenis',
        'url_doi',
        'file_path',
        'kontribusi',
        'pemeringkatan',
        'jumlah_sitasi',
        'keterlibatan_mahasiswa',
        'nama_mahasiswa',
        'kesesuaian_roadmap',
        'kesesuaian_topik_infokom',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
