<?php

class Trabajador extends Eloquent {

    protected $table = 'trabajador';

    public function usuario() {
        return $this->hasOne('Usuario');
    }

}
