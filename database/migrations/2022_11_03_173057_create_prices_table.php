<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('byn');
            $table->float('rub');
            $table->float('usd');
            $table->float('eur');
            $table->float('uah');
        });
    }

    public function down()
    {
        Schema::dropIfExists('prices');
    }
};
