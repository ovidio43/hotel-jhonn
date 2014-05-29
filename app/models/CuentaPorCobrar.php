<?php

class CuentaPorCobrar extends Eloquent {

    protected $table = 'cuenta_por_cobrar';

    public function reserva() {
        return $this->belongsTo('Reserva', 'id');
    }

}
