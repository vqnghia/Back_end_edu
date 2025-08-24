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
        Schema::create('lich_day', function (Blueprint $table) {
            $table->id();
            $table->char('lop_hoc_id',10);
            $table->string('thu');
            $table->enum('buoi', ['morning', 'afternoon', 'evening']);
            $table->boolean('trang_thai')->default(false);
            $table->timestamps();

            $table->foreign('lop_hoc_id')->references('id')->on('lop_hoc')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lich_day');
    }
};
