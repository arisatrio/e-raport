<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'role_id',
        'name',
        'username',
        'email',
        'password',
        'nohp',
        'alamat',
        //
        'angkatan',
    ];

    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }

    public function isAdmin(){
        return (\Auth::user()->role_id == 1);
    }

    public function isWalas(){
        return (\Auth::user()->role_id == 2);
    }

    public function isGuru(){
        return (\Auth::user()->role_id == 3);
    }

    public function isMurid(){
        return (\Auth::user()->role_id == 4);
    }

    public function isGuruBk(){
        return (\Auth::user()->role_id == 5);
    }

    public function guruMapel()
    {
        return $this->hasMany(MMapelUmum::class, 'guru_id');
    }

    public function waliKelas()
    {
        // return $this->belongsToMany(MKelas::class, 'k_kelas')
        //     ->using(KKelas::class)
        //     ->withPivot('ta')
        //     ->withTimestamps();
        // return $this->belongsTo()
    }

    public function kelasSiswa()
    {
        return $this->hasMany(KKelasSiswa::class, 'murid_id');
    }

    public function raporAbsensi()
    {
        return $this->hasMany(RAbsensi::class, 'murid_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
