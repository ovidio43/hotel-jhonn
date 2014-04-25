<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTipoHabitacion extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tipo_habitacion', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 255);
            $table->string('descripcion', 500);
            $table->float('monto');
            $table->string('acitvo', 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('tipo_habitacion');
    }

}
