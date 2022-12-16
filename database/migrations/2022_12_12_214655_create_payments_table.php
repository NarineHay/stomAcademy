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
            $table->unsignedBigInteger('course_id')->nullable();
            $table->unsignedBigInteger('webinar_id')->nullable();
            $table->integer('sum');
            $table->string('currency_id');
            $table->string('manager');
            $table->longText('comment');
        });
    }
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
