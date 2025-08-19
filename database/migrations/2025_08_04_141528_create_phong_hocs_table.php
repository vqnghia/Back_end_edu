<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('phong_hoc', function (Blueprint $table) {
            $table->char('id', 10)->primary();
            $table->char('so_phong', 20);
            $table->string('vi_tri_phong', 100);
            $table->char('so_cho_ngoi', 10);
            $table->timestamps(); // nếu không cần created_at/updated_at thì bỏ dòng này
        });
    }

    public function down()
    {
        Schema::dropIfExists('phong_hoc');
    }
};
