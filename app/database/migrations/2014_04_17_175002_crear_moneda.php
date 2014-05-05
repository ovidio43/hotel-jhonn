<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearMoneda extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('moneda', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 50);
            $table->string('pais', 100);            
            $table->string('simbolo', 20);            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('moneda');
    }

}
