<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
        Schema::table('nhan_vien', function (Blueprint $table) {
            $table->char('tai_khoan_id', 10)->nullable()->after('id');

            $table->foreign('tai_khoan_id')->references('id')->on('tai_khoan')->onDelete('set null');

        });
    }

    public function down()
    {
        Schema::table('nhan_vien', function (Blueprint $table) {
            $table->dropForeign(['tai_khoan_id']);

            $table->dropColumn(['tai_khoan_id']);
        });
    }

};
