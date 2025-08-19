<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('giao_vien', function (Blueprint $table) {
            $table->char('tai_khoan_id', 10)->nullable()->after('id');
            $table->char('chuc_vu_id', 10)->nullable()->after('tai_khoan_id');

            $table->foreign('tai_khoan_id')->references('id')->on('tai_khoan')->onDelete('set null');
            $table->foreign('chuc_vu_id')->references('id')->on('chuc_vu')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('giao_vien', function (Blueprint $table) {
            $table->dropForeign(['tai_khoan_id']);
            $table->dropForeign(['chuc_vu_id']);
            $table->dropColumn(['tai_khoan_id', 'chuc_vu_id']);
        });
    }

};
