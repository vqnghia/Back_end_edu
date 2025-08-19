<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDon extends Model
{
    protected $table = 'chi_tiet_hoa_don';

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false; // id là char(10)
    public $timestamps = true;

    protected $fillable = [
        'id',
        'hoa_don_id',
        'hoc_sinh_id',
    ];

    public function hoaDonHocPhi()
    {
        return $this->belongsTo(HoaDonHocPhi::class, 'hoa_don_id', 'id');
    }

    public function hocSinh()
    {
        return $this->belongsTo(HocSinh::class, 'hoc_sinh_id', 'id');
    }
}
