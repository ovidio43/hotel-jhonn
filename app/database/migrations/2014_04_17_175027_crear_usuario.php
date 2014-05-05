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
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->date('fecha_creacion');
            $table->string('remember_token', 100);
            $table->string('activo', 1);
            $table->integer('id_trabajador')->unsigned();
            $table->foreign('id_trabajador')->references('id')->on('trabajador')->onDelete('cascade');
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
