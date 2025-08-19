<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('nhan_vien', function (Blueprint $table) {
            $table->char('id', 10)->primary();
            $table->string('ho_ten', 150);
            $table->string('cccd', 20)->unique();
            $table->string('dia_chi', 200);
            $table->char('so_dien_thoai', 10);
            $table->string('email', 100)->unique();
            $table->char('chuc_vu_id', 10);
            $table->char('phong_ban_id', 10);
            $table->timestamps();

            // Ràng buộc khóa ngoại
            $table->foreign('chuc_vu_id')
                  ->references('id')->on('chuc_vu')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->foreign('phong_ban_id')
                  ->references('id')->on('phong_ban')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

        });
    }

    public function down()
    {
        Schema::dropIfExists('nhan_vien');
    }
};
