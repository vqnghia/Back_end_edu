<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('nguoi_thue_phong', function (Blueprint $table) {
            $table->char('id', 10)->primary();
            $table->string('ho_ten', 100);
            $table->char('gioi_tinh', 10);
            $table->char('so_dien_thoai', 20)->unique();
            $table->char('cccd', 20)->unique();
            $table->string('dia_chi', 200);
            $table->string('email', 200)->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nguoi_thue_phong');
    }
};
