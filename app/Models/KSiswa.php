<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class KSiswa extends Pivot
{
    protected $table = 'k_kelas_siswas';
    protected $fillable = ['m_kelas_id', 'user_id', 'ta'];
}
