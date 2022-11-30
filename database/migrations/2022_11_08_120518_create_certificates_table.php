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
            $table->integer('name_x');
            $table->integer('name_y');
            $table->integer('hour_x');
            $table->integer('hour_y');
            $table->integer('id_x');
            $table->integer('id_y');
            $table->string('type');
            $table->integer('hours_number');
            $table->date('date');
            $table->date('image');
        });
    }

    public function down()
    {
        Schema::dropIfExists('certificates');
    }
};
