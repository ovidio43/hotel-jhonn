<?php

class Reserva extends Eloquent {

    protected $table = 'reserva';

    public function habitacion() {
        return $this->belongsToMany('Habitacion', 'id_habitacion');
    }

}
