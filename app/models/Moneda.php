<?php

class Moneda extends Eloquent {

    protected $table = 'moneda';

    public function precio() {
        return $this->hasMany('Precio','id_moneda');
    }

}
