<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    protected $table = 'chuc_vu';

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false; // vì id là char(10), không auto-increment

    // Nếu bạn giữ $table->timestamps() trong migration thì để true, nếu bỏ thì set = false
    public $timestamps = true;

    protected $fillable = [
        'id',
        'ten_chuc_vu',
        'mo_ta',
    ];
}
