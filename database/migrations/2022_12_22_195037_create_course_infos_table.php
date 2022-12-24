<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('course_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("lg_id")->index();
            $table->unsignedBigInteger("course_id")->index();
            $table->string('title');
            $table->longText('description');
        });
    }

    public function down()
    {
        Schema::dropIfExists('course_infos');
    }
};
