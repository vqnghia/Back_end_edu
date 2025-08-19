<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('chi_tiet_lop_hoc', function (Blueprint $table) {
            $table->char('id', 10)->primary();
            $table->char('lop_hoc_id', 10);
            $table->char('hoc_sinh_id', 10);
            $table->timestamps();

            // khóa ngoại
            $table->foreign('lop_hoc_id')
                  ->references('id')->on('lop_hoc')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('hoc_sinh_id')
                  ->references('id')->on('hoc_sinh')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            // tránh trùng lặp cùng học sinh trong cùng lớp
            $table->unique(['lop_hoc_id', 'hoc_sinh_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('chi_tiet_lop_hoc');
    }
};
