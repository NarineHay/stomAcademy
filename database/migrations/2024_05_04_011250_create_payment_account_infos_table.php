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
        Schema::create('payment_account_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("payment_account_id");
            $table->foreign('payment_account_id')->references('id')->on('payment_accounts')->onDelete("cascade");
            $table->enum("type",['course',"webinar"]);
            $table->integer("item_id");
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
        Schema::dropIfExists('payment_account_infos');
    }
};
