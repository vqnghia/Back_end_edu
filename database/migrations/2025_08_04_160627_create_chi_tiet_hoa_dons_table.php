<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('chi_tiet_hoa_don', function (Blueprint $table) {
            $table->char('id', 10)->primary();
            $table->char('hoa_don_id', 10);
            $table->char('hoc_sinh_id', 10);
            $table->timestamps();

            // Khóa ngoại
            $table->foreign('hoa_don_id')
                  ->references('id')->on('hoa_don_hoc_phi')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->foreign('hoc_sinh_id')
                  ->references('id')->on('hoc_sinh')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            // Tránh trùng lặp cùng học sinh trong cùng hóa đơn
            $table->unique(['hoa_don_id', 'hoc_sinh_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('chi_tiet_hoa_don');
    }
};
