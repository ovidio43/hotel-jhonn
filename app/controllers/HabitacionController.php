<?php

class HabitacionController extends \BaseController {

    private $rules = array(
        'nro' => 'required|numeric|unique:habitacion',
        'id_tipo_habitacion' => 'required'
    );
    private $message = array(
        'numeric' => 'Solo Números',
        'required' => 'Campo Obligatorio.',
        'unique' => 'El Nro. de Habitación ya existe.'
    );

    public function __construct() {
        $this->beforeFilter(function() {
            if (!Auth::check()) {
                return Redirect::to('/');
            }
        });
    }

    public function index() {
        $ObjHabitacion = Habitacion::orderby('nro','asc')->get();
        return View::make('Habitacion.index')->with('Habitacion', $ObjHabitacion);
    }

    public function create() {
        return View::make('Habitacion.create');
    }

    public function store() {
        $ObjHabitacion = new Habitacion;
        $input = Input::all();
        $ObjHabitacion->nro = $input['nro'];
        $ObjHabitacion->estado = 'LIBRE';
        $ObjHabitacion->id_tipo_habitacion = $input['id_tipo_habitacion'];
        $ObjHabitacion->acitvo = 1;
        $validation = Validator::make($input, $this->rules, $this->message);
        if (!$validation->fails()) {
            $ObjHabitacion->save();
            return Redirect::to('administracion/habitacion')->with('Habitacion', Input::all());
        } else {
            return Redirect::back()->withErrors($validation);
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
        $ObjHabitacion = Habitacion::find($id);
        $ObjHabitacion->id_tipo_habitacion = $input['id_tipo_habitacion'];
        $this->rules = array(
            'id_tipo_habitacion' => 'required'
        );
        $validation = Validator::make($input, $this->rules, $this->message);
        if (!$validation->fails()) {
            $ObjHabitacion->save();
            return Redirect::to('administracion/habitacion')->with('Habitacion', $input);
        } else {
            return Redirect::back()->withErrors($validation);
        }
    }

    public function destroy($id) {
        $ObjHabitacion = Habitacion::find($id);
        $ObjHabitacion->delete();
        return Redirect::to('administracion/habitacion');
    }

}
