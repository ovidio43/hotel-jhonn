<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearCliente extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cliente', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',255);
            $table->string('apellidoP',255);
            $table->string('apellidoM',255);
            $table->string('telefono',255);
            $table->string('direccion',255);
            $table->string('email',255);
            $table->string('ci',255);
            $table->string('acitvo',1);            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('cliente');
    }

}
