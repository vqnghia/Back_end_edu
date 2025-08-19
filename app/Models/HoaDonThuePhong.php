<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoaDonThuePhong extends Model
{
    protected $table = 'hoa_don_thue_phong';

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    public $timestamps = true;

    protected $fillable = [
        'id',
        'phieu_thue_id',
        'ngay_het_han',
        'tong_tien',
    ];

    public function phieuThuePhong()
    {
        return $this->belongsTo(PhieuThuePhong::class, 'phieu_thue_id', 'id');
    }
}
