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
            $table->string('youtube_email')->unique();
            $table->string('phone');
            $table->date('birth_date');
            $table->unsignedBigInteger("country_id");
            $table->string('city');
            $table->boolean('status')->default(true);
            $table->string('image');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_infos');
    }
};
