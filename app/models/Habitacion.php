<?php

class Habitacion extends Eloquent {

    protected $table = 'habitacion';

    public function tipoHabitacion() {
        return $this->belongsTo('TipoHabitacion', 'id_tipo_habitacion');
    }

    public function reserva() {
        return $this->belongsToMany('Reserva', 'id_reserva');
    }

}
