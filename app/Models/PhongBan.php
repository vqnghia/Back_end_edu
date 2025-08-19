<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhongBan extends Model
{
    protected $table = 'phong_ban';

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false; // vì id là char(10), không auto-increment

    // Nếu migration giữ lại timestamps thì để true (mặc định), nếu bạn xoá timestamps trong migration thì set = false
    public $timestamps = true;

    protected $fillable = [
        'id',
        'ten_phong_ban',
        'so_dien_thoai',
        'dia_chi',
    ];
}
