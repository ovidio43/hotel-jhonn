<?php

class CuentaPorCobrarController extends \BaseController {

    public function __construct() {
        $this->beforeFilter(function() {
            if (!Auth::check()) {
                return Redirect::to('/');
            }
        });
    }

    public function guardar($id_reserva) {
        $objReserva = Reserva::find($id_reserva);
        $monto = ($objReserva->total - $this->getMonto($objReserva));
        $objCuentaPC = new CuentaPorCobrar();
        $objCuentaPC->fecha = date('Y-m-d H:i:s');
        $objCuentaPC->monto = $monto;
        $objCuentaPC->estado = '1';
        $objCuentaPC->activo = '1';
        $objCuentaPC->id_reserva = $objReserva->id;
        $objCuentaPC->id_cliente = $objReserva->id_cliente;
        $objCuentaPC->save();
        return View::make('Reserva.confirmado')->with('Reserva', $objReserva);
    }

    private function getMonto($objReserva) {
        $monto = 0;
        if (count($objReserva->pago) > 0) {
            foreach ($objReserva->pago as $rowP) {
                $monto+=$rowP->monto;
            }
        }
        return $monto;
    }

}
