<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearCuentaPorCobrar extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cuenta_por_cobrar', function(Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha');
            $table->char('estado', 1);
            $table->char('activo', 1);
            $table->float('monto');            
            $table->integer('id_cliente')->unsigned();
            $table->foreign('id_cliente')->references('id')->on('cliente')->onDelete('cascade');
            $table->integer('id_reserva')->unsigned();
            $table->foreign('id_reserva')->references('id')->on('reserva')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('cuenta_por_cobrar');
    }

}
