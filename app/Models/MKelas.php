<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MKelas extends Model
{
    use SoftDeletes;
    protected $fillable = ['m_tahun_ajarans_id', 'm_jurusans_id', 'kelas'];

    public function tahunAjaran()
    {
        return $this->belongsTo(MTahunAjaran::class, 'm_tahun_ajarans_id');
    }

    public function jurusan()
    {
        return $this->belongsTo(MJurusan::class, 'm_jurusans_id');
    }
}
