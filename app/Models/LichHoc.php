<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LichHoc extends Model
{
    protected $table = 'lich_hoc';
    protected $primaryKey = 'id';
    public $incrementing = false; // do khóa chính là char
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'lop_hoc_id',
        'phong_hoc_id',
        'thu_trong_tuan',
        'gio_bat_dau',
        'gio_ket_thuc',
    ];

    // Mối quan hệ với lớp học
    public function lopHoc()
    {
        return $this->belongsTo(LopHoc::class, 'lop_hoc_id');
    }

    // Mối quan hệ với phòng học
    public function phongHoc()
    {
        return $this->belongsTo(PhongHoc::class, 'phong_hoc_id');
    }

    // Danh sách giáo viên được phân công
    public function phanCongGiangDay()
    {
        return $this->hasMany(PhanCongGiangDay::class, 'lich_hoc_id');
    }
}
