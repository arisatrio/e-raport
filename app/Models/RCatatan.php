<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RCatatan extends Model
{
    protected $table = 'r_catatan_siswas';
    protected $fillable = [
        'm_tahun_ajaran_id',
        'k_kelas_id',
        'murid_id',
        'eskul_id',
        'nilai_eskul',
        'catatan',
    ];

    public function siswa()
    {
        return $this->belongsTo(User::class, 'murid_id');
    }

    public function eskul()
    {
        return $this->belongsTo(MEskul::class, 'eskul_id');
    }
}
