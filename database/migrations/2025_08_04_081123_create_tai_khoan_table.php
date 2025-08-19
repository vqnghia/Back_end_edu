<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tai_khoan', function (Blueprint $table) {
            $table->char('ID', 10)->primary();
            $table->string('username', 50);
            $table->string('password', 50);
        });
    }

    public function down()
    {
        Schema::dropIfExists('tai_khoan');
    }
};

