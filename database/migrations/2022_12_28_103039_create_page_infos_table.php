<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('page_infos', function (Blueprint $table) {
            $table->id();
            $table->boolean("enabled")->default(false);
            $table->string('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->string('heading')->nullable();
            $table->unsignedBigInteger('lg_id')->nullable();
            $table->unsignedBigInteger('page_id')->nullable();
            $table->foreign('page_id')->references('id')->on('pages')->onDelete("cascade");
        });
    }

    public function down()
    {
        Schema::dropIfExists('page_infos');
    }
};
