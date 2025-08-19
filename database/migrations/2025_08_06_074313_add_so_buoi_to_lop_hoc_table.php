<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('lop_hoc', function (Blueprint $table) {
            $table->integer('so_buoi')->after('don_gia')->nullable();
        });
    }

    public function down()
    {
        Schema::table('lop_hoc', function (Blueprint $table) {
            $table->dropColumn('so_buoi');
        });
    }

};
