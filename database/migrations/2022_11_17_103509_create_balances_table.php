<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->float('balance')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('balances');
    }
};
