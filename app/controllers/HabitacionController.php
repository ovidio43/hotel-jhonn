<?php

class HabitacionController extends \BaseController {

    private $rules = array(
        'nro' => 'required|numeric|unique:habitacion',
        'id_tipo_habitacion' => 'required'
    );

    public function __construct() {
        $this->beforeFilter(function() {
            if (!Auth::check()) {
                return Redirect::to('/');
            }
        });
    }

    public function index() {
        $ObjHabitacion = Habitacion::orderby('id_tipo_habitacion', 'asc')->get();
        return View::make('Habitacion.index')->with('Habitacion', $ObjHabitacion);
    }

    public function create() {
        return View::make('Habitacion.create');
    }

    public function store() {
        $input = Input::all();
        $validation = Validator::make($input, $this->rules);
        if (!$validation->fails()) {
            $ObjHabitacion = new Habitacion;
            $ObjHabitacion->nro = $input['nro'];
            $ObjHabitacion->estado = 'LIBRE';
            $ObjHabitacion->id_tipo_habitacion = $input['id_tipo_habitacion'];
            $ObjHabitacion->activo = 1;
            $ObjHabitacion->save();
            return Redirect::to('administracion/habitacion');
        } else {
            return Redirect::back()->withErrors($validation)->withInput();
        }
    }

    public function show($id) {
        $ObjHabitacion = Habitacion::find($id);
        return View::make('Habitacion.show')->with('Habitacion', $ObjHabitacion);
    }

    public function edit($id) {
        $ObjHabitacion = Habitacion::find($id);
        return View::make('Habitacion.edit')->with('Habitacion', $ObjHabitacion);
    }

    public function update($id) {
        $input = Input::all();
        $this->rules = array(
            'id_tipo_habitacion' => 'required'
        );
        $validation = Validator::make($input, $this->rules);
        if (!$validation->fails()) {
            $ObjHabitacion = Habitacion::find($id);
            $ObjHabitacion->id_tipo_habitacion = $input['id_tipo_habitacion'];
            $ObjHabitacion->save();
            return Redirect::to('administracion/habitacion');
        } else {
            return Redirect::back()->withErrors($validation)->withInput();
        }
    }

    public function destroy($id) {
        $ObjHabitacion = Habitacion::find($id);
        $ObjHabitacion->delete();
        return Redirect::to('administracion/habitacion');
    }

}
