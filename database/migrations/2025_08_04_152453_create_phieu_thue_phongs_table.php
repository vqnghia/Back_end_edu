<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('phieu_thue_phong', function (Blueprint $table) {
            $table->char('id', 10)->primary();

            $table->char('nhan_vien_id', 10);
            $table->char('nguoi_thue_phong_id', 10);
            $table->char('phong_hoc_id', 10);

            $table->date('tu_ngay');
            $table->date('den_ngay');

            $table->timestamps();

            // Khóa ngoại
            $table->foreign('nhan_vien_id')
                  ->references('id')->on('nhan_vien')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->foreign('nguoi_thue_phong_id')
                  ->references('id')->on('nguoi_thue_phong')
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
        Schema::dropIfExists('phieu_thue_phong');
    }
};
