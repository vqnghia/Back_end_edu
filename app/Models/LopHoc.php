<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LopHoc extends Model
{
    protected $table = 'lop_hoc';

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false; // id là char(10)
    public $timestamps = true;

    protected $fillable = [
        'id',
        'ten_lop',
        'mon_hoc_id',
        'giao_vien_id',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'so_luong',
        'phong_hoc_id',
        'trang_thai',
        'don_gia',
        'so_buoi'
    ];

    public function monHoc()
    {
        return $this->belongsTo(MonHoc::class, 'mon_hoc_id', 'id');
    }

    public function giaoVien()
    {
        return $this->belongsTo(GiaoVien::class, 'giao_vien_id', 'id');
    }

    public function phongHoc()
    {
        return $this->belongsTo(PhongHoc::class, 'phong_hoc_id', 'id');
    }
}
