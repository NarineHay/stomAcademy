<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('lector_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("lg_id")->index();
            $table->unsignedBigInteger("user_id")->index();
            $table->longText('biography')->nullable();
        });
    }
    public function down()
    {
        Schema::dropIfExists('lector_infos');
    }
};
