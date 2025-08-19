<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoaDonHocPhi extends Model
{
    protected $table = 'hoa_don_hoc_phi';

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    public $timestamps = true;

    protected $fillable = [
        'id',
        'nhan_vien_id',
        'lop_hoc_id',
        'ngay_het_han',
        'ngay_lap',
        'tong_tien',
    ];

    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'nhan_vien_id', 'id');
    }

    public function lopHoc()
    {
        return $this->belongsTo(LopHoc::class, 'lop_hoc_id', 'id');
    }
}
