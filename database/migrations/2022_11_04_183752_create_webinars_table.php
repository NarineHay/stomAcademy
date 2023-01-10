<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('webinars', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start_date');
            $table->integer('duration');
            $table->unsignedBigInteger('price_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
            $table->string('image');
            $table->boolean('status')->default(1);
            $table->string('url_to_page')->nullable();
            $table->unsignedBigInteger('direction_id');
            $table->foreign('direction_id')->references('id')->on('directions')->onDelete("cascade");
        });
    }

    public function down()
    {
        Schema::dropIfExists('webinars');
    }
};
