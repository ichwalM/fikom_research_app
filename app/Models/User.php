<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Jurnal;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function dosenProfile()
    {
        return $this->hasOne(DosenProfile::class);
    }
    public function jurnals()
    {
        return $this->hasMany(Jurnal::class);
    }
    public function riwayatPendidikan()
    {
        return $this->hasMany(RiwayatPendidikan::class);
    }
    public function publikasi()
    {
        return $this->hasMany(Publikasi::class);
    }
    public function penelitian()
    {
        return $this->hasMany(Penelitian::class);
    }
    public function pengabdian()
    {
        return $this->hasMany(Pengabdian::class);
    }
}
