<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->longText('description');
            $table->string('video');
            $table->unsignedBigInteger('price_id');
            $table->string('url_to_page')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
