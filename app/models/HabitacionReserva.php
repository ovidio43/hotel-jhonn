<?php

class HabitacionReserva extends Eloquent {

    protected $table = 'habitacion_reserva';

    public function reserva() {
        return $this->belongsTo('Reserva', 'id');
    }
    
    public function habitacion() {
        return $this->belongsTo('Habitacion', 'id');
    }

}
