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
            $table->string('title');
            $table->dateTime('start_date');
            $table->integer('duration');
            $table->longText('description');
            $table->longText('program');
            $table->string('video_invitation');
            $table->unsignedBigInteger('price_id');
            $table->unsignedBigInteger('user_id');
            $table->string('video');
            $table->string('image');
            $table->boolean('status')->default(1);
            $table->string('url_to_page')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('webinars');
    }
};
