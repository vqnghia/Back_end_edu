<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('phan_cong_giang_day', function (Blueprint $table) {
        $table->char('id', 10)->primary();
        $table->char('lich_hoc_id', 10);
        $table->char('giao_vien_id', 10);
        $table->timestamps();

        $table->foreign('lich_hoc_id')->references('id')->on('lich_hoc');
        $table->foreign('giao_vien_id')->references('id')->on('giao_vien');
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phan_cong_giang_day');
    }
};
