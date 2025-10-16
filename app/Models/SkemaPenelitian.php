<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkemaPenelitian extends Model
{
    use HasFactory;
    protected $table = 'skema_penelitian';

    protected $fillable = ['nama_skema'];
    
    public function penelitian(){
        return $this->hasMany(Penelitian::class);
    }
}
