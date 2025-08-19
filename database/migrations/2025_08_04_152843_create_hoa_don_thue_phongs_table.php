<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('hoa_don_thue_phong', function (Blueprint $table) {
            $table->char('id', 10)->primary();
            $table->char('phieu_thue_id', 10);
            $table->date('ngay_het_han');
            $table->decimal('tong_tien', 15, 2); // decimal tốt hơn float cho tiền
            $table->timestamps();

            $table->foreign('phieu_thue_id')
                  ->references('id')->on('phieu_thue_phong')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('hoa_don_thue_phong');
    }
};
