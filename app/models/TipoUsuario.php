<?php

class TipoUsuario extends Eloquent {

    protected $table = 'tipo_usuario';
    
    public function usuario() {
        return $this->hasMany('Usuario');
    }

}
