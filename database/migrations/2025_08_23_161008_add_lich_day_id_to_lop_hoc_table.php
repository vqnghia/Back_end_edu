<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::table('lop_hoc', function (Blueprint $table) {
        $table->unsignedBigInteger('lich_day_id')->nullable();

        $table->foreign('lich_day_id')
            ->references('id')->on('lich_day')
            ->onDelete('set null');
    });

    }

};
