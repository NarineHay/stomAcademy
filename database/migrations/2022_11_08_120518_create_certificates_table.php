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
            $table->string('name_color')->nullable();
            $table->integer('name_size')->nullable();
            $table->string('name_font')->nullable();

            $table->integer('hour_x')->nullable();
            $table->integer('hour_y')->nullable();
            $table->string('hour_color')->nullable();
            $table->integer('hour_size')->nullable();
            $table->string('hour_font')->nullable();

            $table->integer('date_x')->nullable();
            $table->integer('date_y')->nullable();
            $table->string('date_color')->nullable();
            $table->integer('date_size')->nullable();
            $table->string('date_font')->nullable();

            $table->integer('hours_number')->nullable();
            $table->date('date')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('certificates');
    }
};
