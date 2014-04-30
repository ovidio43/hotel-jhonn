<?php

class TipoHabitacion extends Eloquent {

    protected $table = 'tipo_habitacion';

    public function habitacion() {
        return $this->hasMany('Habitacion');
    }

}
