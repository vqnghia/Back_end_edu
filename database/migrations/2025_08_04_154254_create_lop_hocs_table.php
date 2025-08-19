<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('lop_hoc', function (Blueprint $table) {
            $table->char('id', 10)->primary();
            $table->string('ten_lop', 200);
            $table->char('mon_hoc_id', 10);
            $table->char('giao_vien_id', 10);
            $table->date('ngay_bat_dau')->nullable();
            $table->date('ngay_ket_thuc')->nullable();
            $table->integer('so_luong')->default(0);
            $table->char('phong_hoc_id', 10);
            $table->string('trang_thai', 50)->default('dang_di_hoc');
            $table->timestamps();

            // Khóa ngoại
            $table->foreign('mon_hoc_id')
                  ->references('id')->on('mon_hoc')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->foreign('giao_vien_id')
                  ->references('id')->on('giao_vien')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->foreign('phong_hoc_id')
                  ->references('id')->on('phong_hoc')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lop_hoc');
    }
};
