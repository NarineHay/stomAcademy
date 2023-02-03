<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('buy_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
            $table->unsignedBigInteger('item_id');
            $table->string('type');
            $table->enum('status',['success'])->default("success");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('buy_histories');
    }
};
