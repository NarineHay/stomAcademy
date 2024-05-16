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
        Schema::create('lector_incomes_currencies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lector_income_id');
            $table->foreign('lector_income_id')->references('id')->on('lector_incomes')->onDelete("cascade");
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
        Schema::dropIfExists('lector_incomes_currencies');
    }
};
