<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('lop_hoc', function (Blueprint $table) {
            $table->float('don_gia')->after('so_luong')->nullable();
        });
    }

    public function down(): void {
        Schema::table('lop_hoc', function (Blueprint $table) {
            $table->dropColumn('don_gia');
        });
    }
};

