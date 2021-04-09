<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('restaurant_kitchen_id');
            $table->text('name');
            $table->text('location');
            $table->time('opens_at');
            $table->time('closes_at');
            $table->integer('max_seats');
            $table->timestamps();

            $table->foreign('restaurant_kitchen_id')->references('id')->on('restaurant_kitchens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
