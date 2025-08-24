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
        'thu',
        'buoi',
        'trang_thai',
    ];

    // Mối quan hệ với lớp học
    public function lopHoc()
    {
        return $this->belongsTo(LopHoc::class, 'lop_hoc_id');
    }

}
