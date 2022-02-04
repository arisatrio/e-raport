<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MMapel extends Model
{
    protected $table = 'm_mapels';
    protected $fillable = ['m_jurusan_id', 'guru_id', 'golongan', 'mapel', 'tingkat', 'kkm'];

    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }

    public function mapelJurusan()
    {
        return $this->belongsTo(MJurusan::class, 'm_jurusan_id');
    }

    public function nilaiRapor()
    {
        return $this->hasMany(RNilai::class, 'mapel_id');
    }
}
