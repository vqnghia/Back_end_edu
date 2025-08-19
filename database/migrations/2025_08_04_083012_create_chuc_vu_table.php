<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('chuc_vu', function (Blueprint $table) {
            $table->char('id', 10)->primary();
            $table->string('ten_chuc_vu', 100);
            $table->string('mo_ta', 200);
            $table->timestamps(); // nếu không cần created_at/updated_at thì bỏ dòng này
        });
    }

    public function down()
    {
        Schema::dropIfExists('chuc_vu');
    }
};
