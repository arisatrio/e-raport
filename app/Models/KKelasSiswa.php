<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KKelasSiswa extends Model
{
    protected $table = 'k_kelas_siswas';
    protected $fillable = ['k_kelas_id', 'murid_id'];

    public function kelas()
    {
        return $this->belongsTo(KKelas::class, 'k_kelas_id');
    }

    public function siswa()
    {
        return $this->belongsTo(User::class, 'murid_id');
    }
}
