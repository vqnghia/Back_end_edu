<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('giao_vien', function (Blueprint $table) {
            $table->char('id', 10)->primary();
            $table->string('ho_ten', 100);
            $table->char('cccd', 20)->unique();
            $table->string('dia_chi', 200);
            $table->char('so_dien_thoai', 20);
            $table->string('email', 100)->unique();
            $table->char('don_vi_cong_tac_id', 10);
            $table->timestamps();

            // Khóa ngoại tới don_vi_cong_tac
            $table->foreign('don_vi_cong_tac_id')
                  ->references('id')->on('don_vi_cong_tac')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            
        });
    }

    public function down()
    {
        Schema::dropIfExists('giao_vien');
    }
};
