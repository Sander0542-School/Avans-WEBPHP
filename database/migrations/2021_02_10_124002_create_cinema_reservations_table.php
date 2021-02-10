<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCinemaReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cinema_reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cinema_show_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('cinema_show_id')->references('id')->on('cinema_shows');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cinema_reservations');
    }
}
