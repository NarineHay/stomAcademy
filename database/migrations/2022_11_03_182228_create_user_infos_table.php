<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('youtube_email')->nullable();
            $table->string('phone')->nullable();
            $table->date('birth_date')->nullable();
            $table->unsignedBigInteger("country_id")->nullable();
            $table->string('city')->nullable();
            $table->boolean('status')->default(true);
            $table->string('image')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_infos');
    }
};
