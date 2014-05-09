<?php

class PrecioController extends \BaseController {

    public function deletePrecio($idprecio) {
        $ObjPrecio = Precio::find($idprecio);        
        if ($ObjPrecio->delete()) {
            return 'ok';
        } else {
            return 'error';
        }
    }

}
