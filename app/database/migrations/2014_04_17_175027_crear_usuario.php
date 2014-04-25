<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearUsuario extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('usuario', function(Blueprint $table) {
            $table->increments('id');
            $table->string('login', 255);
            $table->string('clave', 255);
            $table->date('fecha_creacion');
            $table->string('acitvo', 1);
            $table->integer('id_trabajador')->unsigned();
            $table->foreign('id_trabajador')->references('id')->on('usuario')->onDelete('cascade');
            $table->integer('id_tipo_usuario')->unsigned();
            $table->foreign('id_tipo_usuario')->references('id')->on('tipo_usuario')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('usuario');
    }

}
