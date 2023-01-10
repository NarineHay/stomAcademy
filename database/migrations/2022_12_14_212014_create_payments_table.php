<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete("cascade");
            $table->unsignedBigInteger('webinar_id')->nullable();
            $table->foreign('webinar_id')->references('id')->on('webinars')->onDelete("cascade");
            $table->integer('sum');
            $table->unsignedBigInteger('currency_id');
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete("cascade");
            $table->string('manager');
            $table->longText('comment');
        });
    }
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
