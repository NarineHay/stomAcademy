<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('webinar_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("webinar_id")->index();
            $table->foreign('webinar_id')->references('id')->on('webinars')->onDelete("cascade");
            $table->unsignedBigInteger("lg_id")->index();
            $table->string('title');
            $table->longText('description');
            $table->longText('program');
            $table->string('video_invitation')->nullable();
            $table->string('video')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('webinar_infos');
    }
};
