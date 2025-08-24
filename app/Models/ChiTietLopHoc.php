<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietLopHoc extends Model
{
    protected $table = 'chi_tiet_lop_hoc';

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = true; // id là char(10)
    public $timestamps = true;

    protected $fillable = [
        'id',
        'lop_hoc_id',
        'hoc_sinh_id',
    ];

    public function lopHoc()
    {
        return $this->belongsTo(LopHoc::class, 'lop_hoc_id', 'id');
    }

    public function hocSinh()
    {
        return $this->belongsTo(HocSinh::class, 'hoc_sinh_id', 'id');
    }
}
