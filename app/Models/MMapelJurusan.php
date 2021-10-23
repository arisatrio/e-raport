<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MMapelJurusan extends Model
{
    protected $fillable = ['m_jurusans_id', 'golongan', 'mapel', 'tingkat', 'kkm'];

    public function mapelJurusan()
    {
        return $this->belongsTo(MJurusan::class, 'm_jurusans_id');
    }
}
