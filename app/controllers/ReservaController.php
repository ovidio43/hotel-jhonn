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

    public function show($id) {
        $ObjHabitacion = Habitacion::find($id);
        return View::make('Reserva.detail')->with('Habitacion', $ObjHabitacion);
    }

    public function create() {
        return View::make('Reserva.available');
    }

    public function store() {
//        $input = Input::all();
//        $validation = Validator::make($input, $this->rules, $this->message);
//        if (!$validation->fails()) {
//            DB::transaction(function() use ($input) {
//                $id_reserva = $this->saveRserva($input);
//                $this->saveHabitacionReserva($input['id_habitacion'], $id_reserva);
//                $this->uploadEstadoHabitacion($input['id_habitacion']);
//                if ($input['monto'] > 0) {
//                    $this->savePago($input, $id_reserva);
//                }
//            });
//            return View::make('Reserva.index');
//        } else {
//            return View::make('Reserva.create')->withErrors($validation);
//        }
    }

    public function saveReservation() {
        $input = Input::all();
        $validation = Validator::make($input, $this->rules, $this->message);
        if (!$validation->fails()) {
            DB::transaction(function() use ($input) {
                $id_reserva = $this->saveRserva($input);
                $this->saveHabitacionReserva($input['id_habitacion'], $id_reserva);
                $this->uploadEstadoHabitacion($input['id_habitacion']);
                if ($input['monto'] > 0) {
                    $this->savePago($input, $id_reserva);
                }
            });
            return View::make('Reserva.index');
        } else {
            $ObjHabitacion = Habitacion::find($input['id_habitacion']);
            return View::make('Reserva.detail')->with('Habitacion', $ObjHabitacion)->withErrors($validation);
        }
    }

    public function edit($id) {
        
    }

    public function update($id) {
        
    }

    public function destroy($id) {
        
    }

    private function saveRserva($input) {
        $ObjReserva = new Reserva();
        $ObjReserva->fecha = date('Y-m-d H:i:s');
        $ObjReserva->fecha_entrada = $input['fecha_entrada'] . ' ' . date('H:i:s');
        $ObjReserva->fecha_salida = $input['fecha_salida'] . ' 15:00:00';
        $ObjReserva->descripcion = $input['descripcion'];
        $ObjReserva->estado_pago = $input['saldo'] > 0 ? 'PENDIENTE' : 'CANCELADO';
        $ObjReserva->dias = $input['dias'];
        $ObjReserva->total = $input['total'];
        $ObjReserva->activo = 1;
        $ObjReserva->id_trabajador = Auth::user()->id;
        $ObjReserva->id_cliente = $input['id_cliente'];
        $ObjReserva->save();
        return $ObjReserva->id;
    }

    private function saveHabitacionReserva($id_habitacion, $id_reserva) {
        $ObjHabitacionReserva = new HabitacionReserva();
        $ObjHabitacionReserva->id_reserva = $id_reserva;
        $ObjHabitacionReserva->id_habitacion = $id_habitacion;
        $ObjHabitacionReserva->save();
    }

    private function savePago($input, $id_reserva) {
        $ObjPago = new Pago();
        $ObjPago->fecha = date('Y-m-d H:i:s');
        $ObjPago->monto = $input['monto'];
        $ObjPago->concepto = $input['saldo'] > 0 ? $this->concepto['pendiente'] : $this->concepto['cancelado'];
        $ObjPago->activo = 1;
        $ObjPago->id_reserva = $id_reserva;
        $ObjPago->id_moneda = $input['id_moneda'];
        $ObjPago->save();
    }

    private function uploadEstadoHabitacion($id_habitacion) {
        $ObjHabitacion = Habitacion::find($id_habitacion);
        $ObjHabitacion->estado = 'OCUPADO';
        $ObjHabitacion->save();
    }

    public function realizarCobro($id_reserva) {
        $objReserva=  Reserva::find($id_reserva);
         return View::make('Reserva.cobrar')->with('Reserva',$objReserva);
         }

}
