<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiaoVien extends Model
{
    protected $table = 'giao_vien';

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false; // vì id là char(10), không auto-increment

    public $timestamps = true;

    protected $fillable = [
        'id',
        'tai_khoan_id',
        'ho_ten',
        'cccd',
        'dia_chi',
        'so_dien_thoai',
        'email',
        'chuc_vu_id',
        'don_vi_cong_tac_id',
    ];

    // Quan hệ tới chức vụ
    public function chucVu()
    {
        return $this->belongsTo(ChucVu::class, 'chuc_vu_id', 'id');
    }


    // Quan hệ tới đơn vị công tác
    public function donViCongTac()
    {
        return $this->belongsTo(DonViCongTac::class, 'don_vi_cong_tac_id', 'id');
    }
    public function taiKhoan()
    {
        return $this->belongsTo(TaiKhoan::class, 'tai_khoan_id', 'ID');
    }
}
