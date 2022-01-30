<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Model;

class KKelas extends Model
{
    protected $table = 'k_kelas';
    protected $fillable = ['m_tahun_ajaran_id', 'm_jurusan_id', 'wali_kelas_id', 'tingkat', 'ruangan'];

    public function tahunAjaran()
    {
        return $this->belongsTo(MTahunAjaran::class, 'm_tahun_ajaran_id');
    }

    public function waliKelas()
    {
        return $this->belongsTo(User::class, 'wali_kelas_id');
    }

    public function jurusan()
    {
        return $this->belongsTo(MJurusan::class, 'm_jurusan_id');
    }

    public function siswaKelas()
    {
        return $this->hasMany(KKelasSiswa::class, 'k_kelas_id');
    }

    public function raporAbsensi()
    {
        return $this->hasMany(RAbsensi::class, 'k_kelas_id');
    }
}
