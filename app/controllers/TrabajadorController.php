<?php

class TrabajadorController extends \BaseController {

    private $rules = array(
        'nombre' => 'Required|',
        'apellidoP' => 'Required',
        'apellidoM' => 'Required',
        'ci' => 'Required',
        'telefono' => 'numeric',
        'email' => 'email'
    );
    private $message = array(
        'required' => 'Campo Obligatorio',
        'numeric' => 'Solo Números',
        'email' => 'Email Invalido, (Ej: myemail@dominio.com)'
    );

  public function __construct() {
        $this->beforeFilter(function() {
            if (!Auth::check()) {
                return Redirect::to('/');
            }
        });
    }

    public function index() {
        $ObjTrabajador = Trabajador::all();
        return View::make('Trabajador.index')->with('Trabajador', $ObjTrabajador);
    }

    public function create() {
        return View::make('Trabajador.create');
    }

    public function store() {
        $ObjTrabajador = new Trabajador;
        $input = Input::all();
        $ObjTrabajador->nombre = $input['nombre'];
        $ObjTrabajador->apellidoP = $input['apellidoP'];
        $ObjTrabajador->apellidoM = $input['apellidoM'];
        $ObjTrabajador->telefono = $input['telefono'];
        $ObjTrabajador->direccion = $input['direccion'];
        $ObjTrabajador->ci = $input['ci'];
        $ObjTrabajador->email = $input['email'];
        $ObjTrabajador->acitvo = 1;
        $validation = Validator::make($input, $this->rules, $this->message);
        if (!$validation - Redirect > fails()) {
            $ObjTrabajador->save();
            return Redirect::to('trabajador')->with('Trabajador', Input::all());
        } else {
            return Redirect::back()->withErrors($validation);
        }
    }

    public function show($id) {
        $ObjTrabajador = Trabajador::find($id);
        return View::make('Trabajador.show')->with('Trabajador', $ObjTrabajador);
    }

    public function edit($id) {
        $ObjTrabajador = Trabajador::find($id);
        return View::make('Trabajador.edit')->with('Trabajador', $ObjTrabajador);
    }

    public function update($id) {
        $input = Input::all();
        $ObjTrabajador = Trabajador::find($id);
        $ObjTrabajador->nombre = $input['nombre'];
        $ObjTrabajador->apellidoP = $input['apellidoP'];
        $ObjTrabajador->apellidoM = $input['apellidoM'];
        $ObjTrabajador->telefono = $input['telefono'];
        $ObjTrabajador->direccion = $input['direccion'];
        $ObjTrabajador->ci = $input['ci'];
        $ObjTrabajador->email = $input['email'];
        $ObjTrabajador->acitvo = 1;
        $validation = Validator::make($input, $this->rules, $this->message);
        if (!$validation->fails()) {
            $ObjTrabajador->save();
            return Redirect::to('trabajador')->with('Trabajador', $input);
        } else {
            return Redirect::back()->withErrors($validation);
        }
    }

    public function destroy($id) {
        $ObjTrabajador = Trabajador::find($id);
        $ObjTrabajador->delete();
        return Redirect::to('trabajador');
    }

}
