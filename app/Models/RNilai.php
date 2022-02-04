<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RNilai extends Model
{
    protected $table = 'r_nilai_siswas';
    protected $fillable = [
        'm_tahun_ajaran_id',
        'k_kelas_id',
        'murid_id',
        'mapel_id',
        'pengetahuan',
        'keterampilan',
        'nilai_akhir',
        'predikat',
        'sikap'
    ];

    public function mapel()
    {
        return $this->belongsTo(MMapel::class, 'mapel_id');
    }

    public function siswa()
    {
        return $this->belongsTo(User::class, 'murid_id');
    }

    public function kelas()
    {
        return $this->belongsTo(KKelas::class, 'k_kelas_id');
    }

    public function scopeSiswaIs($query, $value, $kelas)
    {
        return $query->where('murid_id', $value)->where('k_kelas_id', $kelas);
    }
}
