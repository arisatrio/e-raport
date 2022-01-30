<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MKelas extends Model
{
    use SoftDeletes;
    protected $fillable = ['m_jurusan_id', 'tingkat', 'ruangan'];

    public function jurusan()
    {
        return $this->belongsTo(MJurusan::class, 'm_jurusan_id');
    }

    public function waliKelas()
    {
        return $this->belongsToMany(User::class, 'k_kelas')
        ->using(KKelas::class)
        ->withPivot('ta')
        ->withTimestamps();
    }

    public function siswaKelas()
    {
        return $this->belongsToMany(User::class, 'k_kelas_siswas')
            ->using(KSiswa::class)
            ->withTimestamps();
    }
}
