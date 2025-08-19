<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mon_hoc', function (Blueprint $table) {
            $table->char('id', 10)->primary();
            $table->string('mon_hoc', 20);
            $table->string('khoi_lop', 20);
            $table->char('nam_hoc', 20);
            $table->timestamps(); // nếu không cần created_at/updated_at thì bỏ dòng này
            $table->unique(['mon_hoc', 'khoi_lop', 'nam_hoc']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('mon_hoc');
    }
};
