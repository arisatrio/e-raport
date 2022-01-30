<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RAbsensi extends Model
{
    protected $table = 'r_absensi_siswas';
    protected $fillable = [
        'm_tahun_ajaran_id',
        'k_kelas_id',
        'murid_id',
        'h',
        'th',
        'i',
        's',
    ];

    public function siswa()
    {
        return $this->belongsTo(User::class, 'murid_id');
    }
}
