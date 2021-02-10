<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCinemaReservationSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cinema_reservation_seats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cinema_reservation_id');
            $table->integer('row_id');
            $table->integer('seat_id');

            $table->foreign('cinema_reservation_id')->references('id')->on('cinema_reservations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cinema_reservation_seats');
    }
}
