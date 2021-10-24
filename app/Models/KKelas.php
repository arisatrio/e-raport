<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class KKelas extends Pivot
{
    protected $table = 'k_kelas';
    protected $fillable = ['m_kelas_id', 'user_id', 'ta'];
}
