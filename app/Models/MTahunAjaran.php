<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MTahunAjaran extends Model
{
    use SoftDeletes;
    protected $fillable = ['tahun_ajaran', 'semester', 'status'];

    public function getStatusAttribute($value)
    {
        if($value === 1){
            return 'Aktif';
        } else{
            return 'Selesai';
        }
    }
}
