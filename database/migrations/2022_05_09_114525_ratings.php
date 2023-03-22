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
        Schema::create('Audio_ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('track_id');
            $table->unsignedBigInteger('stars_rated');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('track_id')->references('id')->on('audioes');
            $table->timestamps();
        });
        Schema::create('Vedio_ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('track_id');
            $table->unsignedBigInteger('stars_rated');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('track_id')->references('id')->on('vedioes');
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
        //
    }
};
