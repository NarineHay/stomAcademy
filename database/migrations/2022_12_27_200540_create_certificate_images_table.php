<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('certificate_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("certificate_id")->index();
            $table->unsignedBigInteger("lg_id")->index();
            $table->string('image');
        });
    }

    public function down()
    {
        Schema::dropIfExists('certificate_images');
    }
};
