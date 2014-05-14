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
        $ObjReserva->fecha_entrada = $input['fecha_entrada'];
        $ObjReserva->fecha_salida = $input['fecha_salida'];
        $ObjReserva->descripcion = $input['descripcion'];
        $ObjReserva->estado_pago = $input['saldo'] > 0 ? 'PENDIENTE' : 'CANCELADO';
        $ObjReserva->dias = $input['dias'];
        $ObjReserva->total = $input['total'];
        $ObjReserva->activo = 1;
        $ObjReserva->id_trabajador = Auth::user()->id;
        $ObjReserva->id_cliente = $input['id_cliente'];
        $validation = Validator::make($input, $this->rules, $this->message);
        if (!$validation->fails()) {
//            $ObjReserva->save();
            echo $ObjReserva->fecha_entrada;
            echo '<br>';
            echo $ObjReserva->fecha_salida;
            echo '<br>';
            echo $ObjReserva->descripcion;
            echo '<br>';
            echo $ObjReserva->estado_pago;
            echo '<br>';
            echo $ObjReserva->dias;
            echo '<br>';
            echo $ObjReserva->total;
            echo '<br>';
            echo $ObjReserva->activo;
            echo '<br>';
            echo $ObjReserva->id_trabajador;
            echo '<br>';
            echo $ObjReserva->id_cliente;
            echo '<br>';
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
