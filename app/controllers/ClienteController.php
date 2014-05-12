<?php

class ClienteController extends \BaseController {

    private $rules = array(
        'nombre' => 'Required',
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
        $ObjCliente = Cliente::all();
        return View::make('Cliente.index')->with('Cliente', $ObjCliente);
    }

    public function create() {
        return View::make('Cliente.create');
    }

    public function store() {
        $ObjCliente = new Cliente;
        $input = Input::all();
        $ObjCliente->nombre = $input['nombre'];
        $ObjCliente->apellidoP = $input['apellidoP'];
        $ObjCliente->apellidoM = $input['apellidoM'];
        $ObjCliente->telefono = $input['telefono'];
        $ObjCliente->direccion = $input['direccion'];
        $ObjCliente->ci = $input['ci'];
        $ObjCliente->email = $input['email'];
        $ObjCliente->activo = 1;
        $validation = Validator::make($input, $this->rules, $this->message);
        if (!$validation->fails()) {
            $ObjCliente->save();
            return Redirect::to('administracion/cliente')->with('Cliente', Input::all());
        } else {
            return Redirect::back()->withErrors($validation);
        }
    }

    public function show($id) {
        $ObjCliente = Cliente::find($id);
        return View::make('Cliente.show')->with('Cliente', $ObjCliente);
    }

    public function edit($id) {
        $ObjCliente = Cliente::find($id);
        return View::make('Cliente.edit')->with('Cliente', $ObjCliente);
    }

    public function update($id) {
        $input = Input::all();
        $ObjCliente = Cliente::find($id);
        $ObjCliente->nombre = $input['nombre'];
        $ObjCliente->apellidoP = $input['apellidoP'];
        $ObjCliente->apellidoM = $input['apellidoM'];
        $ObjCliente->telefono = $input['telefono'];
        $ObjCliente->direccion = $input['direccion'];
        $ObjCliente->ci = $input['ci'];
        $ObjCliente->email = $input['email'];
        $ObjCliente->activo = 1;
        $validation = Validator::make($input, $this->rules, $this->message);
        if (!$validation->fails()) {
            $ObjCliente->save();
            return Redirect::to('administracion/cliente')->with('Cliente', $input);
        } else {
            return Redirect::back()->withErrors($validation);
        }
    }

    public function destroy($id) {
        $ObjCliente = Cliente::find($id);
        $ObjCliente->delete();
        return Redirect::to('administracion/cliente');
    }

}
