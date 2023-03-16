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
            $table->boolean("enabled")->default(false);
            $table->unsignedBigInteger("lg_id")->index();
            $table->foreign('lg_id')->references('id')->on('languages')->onDelete("cascade");
            $table->unsignedBigInteger("user_id")->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
            $table->longText('biography')->nullable();
        });
    }
    public function down()
    {
        Schema::dropIfExists('lector_infos');
    }
};
