<?php

class TipoHabitacionController extends \BaseController {

    private $rules = array(
        'nombre' => 'required',
        'descripcion' => 'required'
    );

    public function __construct() {
        $this->beforeFilter(function() {
            if (!Auth::check()) {
                return Redirect::to('/');
            }
        });
    }

    public function index() {
        $ObjTipoHabitacion = TipoHabitacion::all();
        return View::make('TipoHabitacion.index')->with('TipoHabitacion', $ObjTipoHabitacion);
    }

    public function create() {
        return View::make('TipoHabitacion.create');
    }

    public function store() {
        $input = Input::all();
        $validation = Validator::make($input, $this->rules);
        if (!$validation->fails()) {
            $ObjTipoHabitacion = new TipoHabitacion;
            $ObjTipoHabitacion->nombre = $input['nombre'];
            $ObjTipoHabitacion->descripcion = $input['descripcion'];
            $ObjTipoHabitacion->save();
            for ($i = 1; $i <= $input['prices']; $i++) {
                $objPrecio = new Precio;
                $objPrecio->monto = $input['monto' . $i];
                $objPrecio->personas = $input['personas' . $i];
                $objPrecio->id_moneda = $input['id_moneda' . $i];
                $objPrecio->id_tipo_habitacion = $ObjTipoHabitacion->id;
                $objPrecio->save();
            }
            return Redirect::to('administracion/tipo-habitacion');
        } else {
            return Redirect::back()->withErrors($validation)->withInput();
        }
    }

    public function edit($id) {
        $ObjTipoHabitacion = TipoHabitacion::find($id);
        return View::make('TipoHabitacion.edit')->with('TipoHabitacion', $ObjTipoHabitacion);
    }

    public function update($id) {
        $input = Input::all();
        $validation = Validator::make($input, $this->rules);
        if (!$validation->fails()) {
            $ObjTipoHabitacion = TipoHabitacion::find($id);
            $ObjTipoHabitacion->nombre = $input['nombre'];
            $ObjTipoHabitacion->descripcion = $input['descripcion'];
            $ObjTipoHabitacion->save();
            for ($i = 1; $i <= $input['prices']; $i++) {
                if (isset($input['id_precio' . $i])) {
                    $objPrecio = Precio::find($input['id_precio' . $i]);
                } else {
                    $objPrecio = new Precio;
                }
                $objPrecio->monto = $input['monto' . $i];
                $objPrecio->personas = $input['personas' . $i];
                $objPrecio->id_moneda = $input['id_moneda' . $i];
                $objPrecio->id_tipo_habitacion = $ObjTipoHabitacion->id;
                $objPrecio->save();
            }
            return Redirect::to('administracion/tipo-habitacion');
        } else {
            return Redirect::back()->withErrors($validation)->withInput();
        }
    }

    public function destroy($id) {
        $ObjTipoHabitacion = TipoHabitacion::find($id);
        $ObjTipoHabitacion->delete();
        return Redirect::to('administracion/tipo-habitacion');
    }

}
