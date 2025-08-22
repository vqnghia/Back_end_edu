<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LichPhong extends Model
{
    protected $table = 'lich_phong';
    protected $fillable = ['phong_id', 'thu', 'buoi', 'trang_thai'];

    public function phong()
    {
        return $this->belongsTo(PhongHoc::class, 'phong_id');
    }
}
