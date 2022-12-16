<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->string('heading')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pages');
    }
};
