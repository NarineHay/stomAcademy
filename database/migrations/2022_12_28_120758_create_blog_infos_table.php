<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('blog_infos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('text')->nullable();
            $table->string('image');
            $table->unsignedBigInteger("lg_id")->index();
            $table->unsignedBigInteger("blog_id")->index();
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete("cascade");
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_infos');
    }
};
