<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete("cascade");
            $table->integer('name_x')->nullable();
            $table->integer('name_y')->nullable();
            $table->integer('hour_x')->nullable();
            $table->integer('hour_y')->nullable();
            $table->integer('id_x')->nullable();
            $table->integer('id_y')->nullable();
            $table->string('type');
            $table->string("image");
            $table->integer('hours_number')->nullable();
            $table->date('date');
        });
    }

    public function down()
    {
        Schema::dropIfExists('certificates');
    }
};
