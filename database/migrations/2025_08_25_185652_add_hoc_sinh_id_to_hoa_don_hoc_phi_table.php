<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
        Schema::table('hoa_don_hoc_phi', function (Blueprint $table) {
            $table->string('hoc_sinh_id', 10)->after('id'); // hoặc kiểu dữ liệu tương ứng với bảng hoc_sinh
            $table->foreign('hoc_sinh_id')->references('id')->on('hoc_sinh')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('hoa_don_hoc_phi', function (Blueprint $table) {
            $table->dropForeign(['hoc_sinh_id']);
            $table->dropColumn('hoc_sinh_id');
        });
    }
};
