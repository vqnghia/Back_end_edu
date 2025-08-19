<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NguoiThuePhong extends Model
{
    protected $table = 'nguoi_thue_phong';

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false; // vì id là char(10)
    public $timestamps = true;

    protected $fillable = [
        'id',
        'ho_ten',
        'gioi_tinh',
        'so_dien_thoai',
        'cccd',
        'dia_chi',
        'email',
    ];
}
