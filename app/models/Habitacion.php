<?php

class Habitacion extends Eloquent {

    protected $table = 'habitacion';

    public function tipoHabitacion() {
        return $this->belongsTo('TipoHabitacion', 'id_tipo_habitacion');
    }

    public function habitacionReserva() {
        return $this->hasMany('HabitacionReserva', 'id_habitacion');
    }

}
