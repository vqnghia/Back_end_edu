<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonViCongTac extends Model
{
    protected $table = 'don_vi_cong_tac';

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false; // id là char(10), không tự tăng

    public $timestamps = true;

    protected $fillable = [
        'id',
        'ten_don_vi',
        'dia_chi',
        'so_dien_thoai',
        'email',
    ];
}
