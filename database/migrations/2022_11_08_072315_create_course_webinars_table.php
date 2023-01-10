<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('course_webinars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete("cascade");
            $table->unsignedBigInteger('webinar_id');
            $table->foreign('webinar_id')->references('id')->on('webinars')->onDelete("cascade");
        });
    }

    public function down()
    {
        Schema::dropIfExists('course_webinars');
    }
};
