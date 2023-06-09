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
        Schema::create('index_contents', function (Blueprint $table) {
            $table->id();
            $table->json("popular");
            $table->json("new");
            $table->json("online_co");
            $table->json("online_le");
            $table->json("articles");
            $table->json("lectors");
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
        Schema::dropIfExists('index_contents');
    }
};
