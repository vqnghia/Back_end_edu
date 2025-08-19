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
        Schema::table('phong_hoc', function (Blueprint $table) {
            $table->string('trang_thai', 50)->nullable()->after('so_cho_ngoi');
        });
    }

    public function down()
    {
        Schema::table('phong_hoc', function (Blueprint $table) {
            $table->dropColumn('trang_thai');
        });
    }

};
