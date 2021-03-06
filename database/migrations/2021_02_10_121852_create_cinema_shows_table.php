<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCinemaShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cinema_shows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cinema_hall_id');
            $table->unsignedBigInteger('movie_id');
            $table->dateTime('start_datetime');
            $table->dateTime('end_datetime');
            $table->timestamps();

            $table->foreign('movie_id')->references('id')->on('cinema_movies');
            $table->foreign('cinema_hall_id')->references('id')->on('cinema_halls');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cinema_shows');
    }
}
