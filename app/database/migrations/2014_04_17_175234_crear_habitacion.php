<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearHabitacion extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('habitacion', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('nro');
            $table->string('estado', 20);
            $table->string('activo', 1);
            $table->integer('id_tipo_habitacion')->unsigned();
            $table->foreign('id_tipo_habitacion')->references('id')->on('tipo_habitacion')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('habitacion');
    }

}
