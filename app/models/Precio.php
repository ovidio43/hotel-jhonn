<?php

class Moneda extends Eloquent {

    protected $table = 'precio';

    public function tipoHabitacion() {
        return $this->belongsTo('TipoHabitacion', 'id_tipo_habitacion');
    }

}
