<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearReserva extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('reserva', function(Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_entrada');
            $table->date('fecha_salida');
            $table->date('fecha_reserva');
            $table->string('descripcion', 500);
            $table->string('estado', 20);
            $table->string('acitvo', 1);
            $table->integer('id_trabajador')->unsigned();
            $table->foreign('id_trabajador')->references('id')->on('usuario')->onDelete('cascade');
            $table->integer('id_cliente')->unsigned();
            $table->foreign('id_cliente')->references('id')->on('cliente')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('reserva');
    }

}
