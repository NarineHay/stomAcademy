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
            $table->boolean("enabled")->default(false);
            $table->unsignedBigInteger("lg_id")->index();
            $table->foreign('lg_id')->references('id')->on('languages')->onDelete("cascade");
            $table->unsignedBigInteger("course_id")->index();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete("cascade");
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('course_infos');
    }
};
