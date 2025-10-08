<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_program_studi',
    ];
    public function dosenProfiles()
    {
        return $this->hasMany(DosenProfile::class);
    }
}
