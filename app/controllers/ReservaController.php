<?php

class ReservaController extends \BaseController {

    private $rules = array(
        'fecha_entrada' => 'Required',
        'fecha_salida' => 'Required',
        'total' => 'Required|numeric',
        'id_cliente' => 'Required',
        'id_habitacion' => 'Required'
    );
    private $message = array(
        'required' => 'Campo Obligatorio',
        'numeric' => 'Solo Números'
    );
    private $concepto = array(
        'pendiente' => 'Queda Saldo pendiente de Cobro',
        'cancelado' => 'Sin cobros pendientes'
    );

    public function __construct() {
        $this->beforeFilter(function() {
            if (!Auth::check()) {
                return Redirect::to('/');
            }
        });
    }

    public function index() {
        return View::make('Reserva.index');
    }

    public function create() {
        return View::make('Reserva.create');
    }

    public function store() {
        $ObjReserva = new Reserva;
        $input = Input::all();
        $ObjReserva->fecha_entrada = $input['fecha_entrada'] . ' ' . date('H:i:s'); 
        $ObjReserva->fecha_salida = $input['fecha_salida']. ' ' . date('H:i:s');;
        $ObjReserva->descripcion = $input['descripcion'];
        $ObjReserva->estado_pago = $input['saldo'] > 0 ? 'PENDIENTE' : 'CANCELADO';
        $ObjReserva->dias = $input['dias'];
        $ObjReserva->total = $input['total'];
        $ObjReserva->activo = 1;
        $ObjReserva->id_trabajador = Auth::user()->id;
        $ObjReserva->id_cliente = $input['id_cliente'];
        $validation = Validator::make($input, $this->rules, $this->message);
        if (!$validation->fails()) {
            $ObjReserva->save();
            foreach ($input['id_habitacion'] as $hab) {
                $ObjHabitacionReserva = new HabitacionReserva;
                $ObjHabitacionReserva->id_reserva = $ObjReserva->id;
                $ObjHabitacionReserva->id_habitacion = $hab;
                $ObjHabitacionReserva->save();
            }
            if ($input['monto'] > 0) {
                $ObjPago = new Pago();
                $ObjPago->fecha = date('Y-m-d H:i:s');
                $ObjPago->monto = $input['monto'];
                $ObjPago->concepto = $input['saldo'] > 0 ? $this->concepto['pendiente'] : $this->concepto['cancelado'];
                $ObjPago->activo = 1;
                $ObjPago->id_reserva = $ObjReserva->id;
                $ObjPago->id_moneda = $input['id_moneda'];
                $ObjPago->save();
            }
            return View::make('Reserva.index');
        } else {
            return View::make('Reserva.create')->withErrors($validation);
        }
    }

    public function edit($id) {
        
    }

    public function update($id) {
        
    }

    public function destroy($id) {
        
    }

    private function getDias($fecha_i, $fecha_f) {
        $dias = (strtotime($fecha_i) - strtotime($fecha_f)) / 86400;
        $dias = abs($dias);
        $dias = floor($dias);
        return $dias;
    }

}
