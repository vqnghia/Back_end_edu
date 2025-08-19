<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('hoa_don_hoc_phi', function (Blueprint $table) {
            $table->char('id', 10)->primary();
            $table->char('nhan_vien_id', 10);
            $table->char('lop_hoc_id', 10);
            $table->date('ngay_het_han');
            $table->date('ngay_lap');
            $table->decimal('tong_tien', 15, 2);
            $table->timestamps();

            // Khóa ngoại
            $table->foreign('nhan_vien_id')
                  ->references('id')->on('nhan_vien')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->foreign('lop_hoc_id')
                  ->references('id')->on('lop_hoc')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('hoa_don_hoc_phi');
    }
};
