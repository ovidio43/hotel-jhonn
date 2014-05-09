<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearPago extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('pago', function(Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha');
            $table->float('monto');
            $table->string('concepto', 500);
            $table->string('activo', 1);
            $table->integer('id_reserva')->unsigned();
            $table->foreign('id_reserva')->references('id')->on('reserva')->onDelete('cascade');
            $table->integer('id_moneda')->unsigned();
            $table->foreign('id_moneda')->references('id')->on('moneda')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('pago');
    }

}
