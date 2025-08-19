<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('don_vi_cong_tac', function (Blueprint $table) {
            $table->char('id', 10)->primary();
            $table->string('ten_don_vi', 200);
            $table->string('dia_chi', 200);
            $table->char('so_dien_thoai', 10);
            $table->string('email', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('don_vi_cong_tac');
    }
};
