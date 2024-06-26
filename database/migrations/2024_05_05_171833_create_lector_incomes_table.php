<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lector_incomes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
            $table->string('type');
            $table->integer('item_id');
            $table->float('per_of_sales');
            $table->unsignedBigInteger('price_id')->nullable();
            $table->unsignedBigInteger('price_2_id')->nullable();
            $table->float('price_byn');
            $table->float('price_rub');
            $table->float('price_usd');
            $table->float('price_eur');
            $table->float('price_uah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lector_incomes');
    }
};
