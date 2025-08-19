<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhanCongGiangDay extends Model
{
    protected $table = 'phan_cong_giang_day';
    protected $primaryKey = 'id';
    public $incrementing = false; // do khóa chính là char
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'lich_hoc_id',
        'giao_vien_id',
    ];

    // Mối quan hệ với lịch học
    public function lichHoc()
    {
        return $this->belongsTo(LichHoc::class, 'lich_hoc_id');
    }

    // Mối quan hệ với giáo viên
    public function giaoVien()
    {
        return $this->belongsTo(GiaoVien::class, 'giao_vien_id');
    }
}
