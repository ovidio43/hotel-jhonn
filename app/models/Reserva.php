<?php

class Reserva extends Eloquent {

    protected $table = 'reserva';

    public function cliente() {
        return $this->belongsTo('Cliente', 'id');
    }

    public function habitacionReserva() {
        return $this->hasMany('HabitacionReserva', 'id_reserva');
    }

    public function pago() {
        return $this->hasMany('Pago', 'id_reserva');
    }

}
