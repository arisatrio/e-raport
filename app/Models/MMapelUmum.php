<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MMapelUmum extends Model
{
    protected $fillable = ['guru_id', 'golongan', 'mapel', 'kkm'];

    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }
}
