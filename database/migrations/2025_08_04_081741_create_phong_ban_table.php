<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('phong_ban', function (Blueprint $table) {
            $table->char('id', 10)->primary();
            $table->string('ten_phong_ban', 100);
            $table->char('so_dien_thoai', 20);
            $table->string('dia_chi', 200);
            $table->timestamps(); // nếu không cần created_at/updated_at thì xóa dòng này
        });
    }

    public function down()
    {
        Schema::dropIfExists('phong_ban');
    }
};
