<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HocSinh extends Model
{
    protected $table = 'hoc_sinh';

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false; // vì id là char(10), không auto-increment

    public $timestamps = true; // nếu bạn bỏ timestamps trong migration thì đổi thành false

    protected $fillable = [
        'id',
        'ho_ten',
        'so_dien_thoai',
        'gioi_tinh',
        'ngay_sinh',
        'dia_chi',
        'so_phu_huynh',
    ];
    public function chiTietLop()
    {
        return $this->hasMany(ChiTietLopHoc::class, 'hoc_sinh_id', 'id');
    }

    public function lopHocs()
    {
        return $this->belongsToMany(LopHoc::class, 'chi_tiet_lop_hoc', 'hoc_sinh_id', 'lop_hoc_id');
    }
      public function hoaDons()
    {
        return $this->hasMany(HoaDonHocPhi::class, 'hoc_sinh_id', 'id');
    }

}
