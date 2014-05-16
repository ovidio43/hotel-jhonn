<?php

class Cliente extends Eloquent {

    protected $table = 'cliente';

    public function reserva() {
        return $this->hasMany('Reserva', 'id_cliente');
    }

}
