<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearPrecio extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('precio', function(Blueprint $table) {
            $table->increments('id');
            $table->float('monto');
            $table->integer('personas');
            $table->integer('id_moneda')->unsigned();
            $table->foreign('id_moneda')->references('id')->on('moneda')->onDelete('cascade');
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
        Schema::drop('precio');
    }

}
