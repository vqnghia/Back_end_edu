<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHopDongThuePhongTable extends Migration
{
    public function up()
    {
        Schema::create('hop_dong_thue_phong', function (Blueprint $table) {
            $table->char('id', 10)->primary();
            $table->char('phieu_thue_phong_id', 10);
            $table->text('dieu_khoan')->nullable();
            $table->float('thanh_tien')->default(0);
            $table->timestamps();

            $table->foreign('phieu_thue_phong_id')
                  ->references('id')
                  ->on('phieu_thue_phong')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('hop_dong_thue_phong');
    }
}
