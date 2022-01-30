<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MJurusan extends Model
{
    use SoftDeletes;
    protected $fillable = ['jurusan', 'kode_jurusan'];

    public function kelasJurusan()
    {
        return $this->hasMany(MKelas::class);
    }

    public function mapelJurusan()
    {
        return $this->hasMany(MMapelJurusan::class);
    }
}
