<?php

class TipoHabitacionController extends \BaseController {

    private $rules = array(
        'nombre' => 'required',
        'descripcion' => 'required',   
        'monto' => 'required|numeric'
    );
    private $message = array(
        'numeric' => 'Solo Números',
        'required' => 'Campo Obligatorio.'
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
        $ObjTipoHabitacion = new TipoHabitacion;
        $input = Input::all();
        $ObjTipoHabitacion->nombre = $input['nombre'];
        $ObjTipoHabitacion->descripcion = $input['descripcion'];
        $ObjTipoHabitacion->monto = $input['monto'];
        $ObjTipoHabitacion->acitvo = 1;
        $validation = Validator::make($input, $this->rules, $this->message);
        if (!$validation->fails()) {
            $ObjTipoHabitacion->save();
            return Redirect::to('administracion/tipo-habitacion')->with('TipoHabitacion', Input::all());
        } else {
            return Redirect::back()->withErrors($validation);
        }
    }
    public function edit($id) {
        $ObjTipoHabitacion = TipoHabitacion::find($id);
        return View::make('TipoHabitacion.edit')->with('TipoHabitacion', $ObjTipoHabitacion);
    }

    public function update($id) {
        $input = Input::all();
        $ObjTipoHabitacion = TipoHabitacion::find($id);
        $ObjTipoHabitacion->nombre = $input['nombre'];
        $ObjTipoHabitacion->descripcion = $input['descripcion'];
        $ObjTipoHabitacion->monto = $input['monto'];
        $validation = Validator::make($input, $this->rules, $this->message);
        if (!$validation->fails()) {
            $ObjTipoHabitacion->save();
            return Redirect::to('administracion/tipo-habitacion')->with('TipoHabitacion', $input);
        } else {
            return Redirect::back()->withErrors($validation);
        }
    }

    public function destroy($id) {
        $ObjTipoHabitacion = TipoHabitacion::find($id);
        $ObjTipoHabitacion->delete();
        return Redirect::to('administracion/tipo-habitacion');
    }

}
