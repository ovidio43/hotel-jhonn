<?php

class Precio extends Eloquent {

    protected $table = 'precio';

    public function tipoHabitacion() {
        return $this->belongsTo('TipoHabitacion', 'id');
    }
    public function moneda() {
         return $this->belongsTo('Moneda','id');
    }

}
