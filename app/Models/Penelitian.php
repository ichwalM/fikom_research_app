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
        'judul',
        'sumber_dana',
        'jumlah_dana',
        'tahun',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
