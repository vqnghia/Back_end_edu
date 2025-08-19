<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonHoc extends Model
{
    protected $table = 'mon_hoc';

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false; // vì id là char(10), không auto-increment

    public $timestamps = true; // nếu bạn bỏ timestamps trong migration thì đổi thành false

    protected $fillable = [
        'id',
        'mon_hoc',
        'khoi_lop',
        'nam_hoc',
    ];
}
