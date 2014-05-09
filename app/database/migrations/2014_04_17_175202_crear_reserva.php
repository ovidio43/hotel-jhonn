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
            $table->dateTime('fecha_entrada');
            $table->dateTime('fecha_salida');            
            $table->string('descripcion', 500);
            $table->string('estado_pago', 20);
             $table->integer('dias');
             $table->float('total');
            $table->string('activo', 1);
            $table->integer('id_trabajador')->unsigned();
            $table->foreign('id_trabajador')->references('id')->on('trabajador')->onDelete('cascade');
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
