<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    protected $table = 'nhan_vien';

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
        'phong_ban_id',
    ];

    // Quan hệ tới chức vụ
    public function chucVu()
    {
        return $this->belongsTo(ChucVu::class, 'chuc_vu_id', 'id');
    }

    // Quan hệ tới phòng ban
    public function phongBan()
    {
        return $this->belongsTo(PhongBan::class, 'phong_ban_id', 'id');
    }

    //Quan hệ tới tài khoản
    public function taiKhoan()
    {
        return $this->belongsTo(TaiKhoan::class, 'tai_khoan_id', 'ID');
    }
}
