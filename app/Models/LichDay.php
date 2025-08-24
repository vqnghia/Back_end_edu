<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LichDay extends Model
{
     protected $table = 'lich_day';
    protected $fillable = ['lop_hoc_id', 'thu', 'buoi'];

    public function lop()
    {
        return $this->belongsTo(LopHoc::class, 'lop_hoc_id');
    }
}

