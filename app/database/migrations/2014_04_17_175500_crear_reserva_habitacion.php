<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearReservaHabitacion extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('reserva_habitacion', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_reserva')->unsigned();
            $table->foreign('id_reserva')->references('id')->on('reserva')->onDelete('cascade');
            $table->integer('id_habitacion')->unsigned();
            $table->foreign('id_habitacion')->references('id')->on('habitacion')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('detalle_reserva_habitacion');
    }

}
