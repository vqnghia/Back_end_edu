<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('phong_hoc', function (Blueprint $table) {
            $table->float('gia_phong')->after('trang_thai')->nullable();
        });
    }

    public function down(): void {
        Schema::table('phong_hoc', function (Blueprint $table) {
            $table->dropColumn('gia_phong');
        });
    }
};
