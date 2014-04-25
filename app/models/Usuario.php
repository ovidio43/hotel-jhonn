<?php

class Usuario extends Eloquent {

    protected $table = 'usuario';

    public function tipoUsuario() {
        return $this->belongsTo('TipoUsuario');
    }

    public function trabajador() {
        return $this->belongsTo('Trabajador');
    }

}
