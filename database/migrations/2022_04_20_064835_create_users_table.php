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
        Schema::disableForeignKeyConstraints();
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->timestamps();
        });


    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('gender')->nullable();
        $table->string('mobileNo')->nullable();
        $table->string('address')->nullable();
        $table->unsignedBigInteger('country_id')->nullable();
        $table->string('email')->unique();
        $table->string('password');
        $table->string('userimage')->nullable();
        $table->timestamp('email_verified_at')->nullable();
        $table->tinyInteger('type')->default(0);
        $table->rememberToken();
        $table->timestamps();
        $table->foreign('country_id')->references('id')->on('Countries');

    });

    Schema::create('artists', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->date('DOB');
        $table->string('artistimage');
        $table->string('recommended')->nullable((true));
        $table->string('trending')->nullable((true));
        $table->string('featured')->nullable((true));
        $table->string('desc');
        $table->string('status')->nullable((true));
        $table->unsignedBigInteger('language_id');
        $table->foreign('language_id')->references('id')->on('languages');
        $table->timestamps();
    });


    Schema::create('gneres', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('gnereimage');
        $table->string('status')->nullable(true);
        $table->timestamps();
    });
    Schema::create('languages', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->timestamps();
    });
    Schema::create('albums', function (Blueprint $table) {
        $table->id();
        $table->string('name')->nullable(true);;
        $table->string('albumimage');
        $table->string('category');
        $table->string('recommended')->nullable(true);
        $table->string('trending')->nullable(true);
        $table->string('featured')->nullable(true);
        $table->longText('desc');
        $table->string('status')->nullable(true);
        $table->timestamps();


    });


    // Schema::create('albumSongs', function (Blueprint $table) {
    //     $table->id();
    //     $table->unsignedBigInteger('album_id');
    //     $table->string('filename');
    //     $table->timestamps();
    //     $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
    //     $table->foreign('album_id')->references('id')->on('albums')->onUpdate('cascade');

    // });

Schema::create('audioes', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->unsignedBigInteger('language_id');
        $table->unsignedBigInteger('artist_id');
        $table->unsignedBigInteger('gnere_id');
        $table->string('audio');
        $table->string('audioimage');
        $table->string('recommended')->nullable(true);
        $table->string('trending')->nullable(true);
        $table->string('featured')->nullable(true);
        $table->longText('desc');
        $table->string('status')->nullable(true);
        $table->timestamps();
        $table->boolean('aproval')->default(0);
        $table->foreign('language_id')->references('id')->on('languages');
        $table->foreign('artist_id')->references('id')->on('artists');
        $table->foreign('gnere_id')->references('id')->on('gneres');

    });
    Schema::create('vedioes', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->unsignedBigInteger('language_id');
        $table->unsignedBigInteger('artist_id');
        $table->unsignedBigInteger('gnere_id');
        $table->string('vedio');
        $table->string('vedioimage');
        $table->boolean('recommended')->nullable(true);
        $table->boolean('trending')->nullable(true);
        $table->boolean('featured')->nullable(true);
        $table->longText('desc');
        $table->boolean('status')->nullable(true);
        $table->timestamps();
        $table->boolean('aproval')->default(0);
        $table->foreign('language_id')->references('id')->on('languages');
        $table->foreign('artist_id')->references('id')->on('artists');
        $table->foreign('gnere_id')->references('id')->on('gneres');

    });
    Schema::create('audioalbums', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('language_id');
        $table->unsignedBigInteger('audio_id');
        $table->unsignedBigInteger('album_id');
        $table->timestamps();
        $table->foreign('language_id')->references('id')->on('languages');
        $table->foreign('audio_id')->references('id')->on('audioes');
        $table->foreign('album_id')->references('id')->on('albums');
    });
    Schema::create('vedioalbums', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('language_id');
        $table->unsignedBigInteger('vedio_id');
        $table->unsignedBigInteger('album_id');
        $table->timestamps();
        $table->foreign('language_id')->references('id')->on('languages');
        $table->foreign('vedio_id')->references('id')->on('audioes');
        $table->foreign('album_id')->references('id')->on('albums');
    });
    Schema::create('slider', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('sliderimage');
        $table->string('status')->nullable(true);
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
Schema::dropIfExists('countries');
Schema::dropIfExists('users');
Schema::dropIfExists('artists');
Schema::dropIfExists('albums');
Schema::dropIfExists('languages');
Schema::dropIfExists('gneres');
Schema::dropIfExists('audioes');
Schema::dropIfExists('albumSongs');
Schema::dropIfExists('vedioes');
Schema::enableForeignKeyConstraints();
    }
};
