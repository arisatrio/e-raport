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
        'catatan',
    ];

    public function siswa()
    {
        return $this->belongsTo(User::class, 'murid_id');
    }
}
