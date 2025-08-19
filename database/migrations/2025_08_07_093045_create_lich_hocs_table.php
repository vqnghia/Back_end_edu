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
     Schema::create('lich_hoc', function (Blueprint $table) {
        $table->char('id', 10)->primary();
        $table->char('lop_hoc_id', 10);
        $table->char('phong_hoc_id', 10);
        $table->string('thu_trong_tuan', 10); // ví dụ: 'thu_2'
        $table->time('gio_bat_dau');
        $table->time('gio_ket_thuc');
        $table->timestamps();

        $table->foreign('lop_hoc_id')->references('id')->on('lop_hoc');
        $table->foreign('phong_hoc_id')->references('id')->on('phong_hoc');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lich_hoc');
    }
};
