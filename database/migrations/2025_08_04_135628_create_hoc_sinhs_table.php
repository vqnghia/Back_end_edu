<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('hoc_sinh', function (Blueprint $table) {
            $table->char('id', 10)->primary();
            $table->string('ho_ten', 100);
            $table->char('so_dien_thoai', 10);
            $table->char('gioi_tinh', 10);
            $table->date('ngay_sinh');
            $table->string('dia_chi', 200);
            $table->char('so_phu_huynh', 10);
            $table->timestamps(); // nếu bạn không cần created_at/updated_at thì bỏ dòng này và set $timestamps = false trong model
        });
    }

    public function down()
    {
        Schema::dropIfExists('hoc_sinh');
    }
};
