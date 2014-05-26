<?php

class ClienteController extends \BaseController {

    private $rules = array(
        'nombre' => 'Required',
        'apellidoP' => 'Required',
        'apellidoM' => 'Required',
        'ci' => 'Required',
        'telefono' => 'numeric',
        'email' => 'unique:cliente|email'
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
        $input = Input::all();
        $validation = Validator::make($input, $this->rules);
        if (!$validation->fails()) {
            $ObjCliente = new Cliente;
            $ObjCliente->nombre = $input['nombre'];
            $ObjCliente->apellidoP = $input['apellidoP'];
            $ObjCliente->apellidoM = $input['apellidoM'];
            $ObjCliente->telefono = $input['telefono'];
            $ObjCliente->direccion = $input['direccion'];
            $ObjCliente->ci = $input['ci'];
            $ObjCliente->email = $input['email'];
            $ObjCliente->activo = 1;
            $ObjCliente->save();
            return Redirect::to('administracion/cliente');
        } else {
            return Redirect::back()->withErrors($validation)->withInput();
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
        $validation = Validator::make($input, $this->rules);
        if (!$validation->fails()) {
            $ObjCliente = Cliente::find($id);
            $ObjCliente->nombre = $input['nombre'];
            $ObjCliente->apellidoP = $input['apellidoP'];
            $ObjCliente->apellidoM = $input['apellidoM'];
            $ObjCliente->telefono = $input['telefono'];
            $ObjCliente->direccion = $input['direccion'];
            $ObjCliente->ci = $input['ci'];
            $ObjCliente->email = $input['email'];
            $ObjCliente->activo = 1;
            $ObjCliente->save();
            return Redirect::to('administracion/cliente');
        } else {
            return Redirect::back()->withErrors($validation)->withInput();
        }
    }

    public function destroy($id) {
        $ObjCliente = Cliente::find($id);
        $ObjCliente->delete();
        return Redirect::to('administracion/cliente');
    }

    public function nuevoCliente() {
        return View::make('Cliente.new');
    }

    public function guardarCliente() {
        $input = Input::all();
        $validation = Validator::make($input, $this->rules);
        if (!$validation->fails()) {
            $ObjCliente = new Cliente;
            $ObjCliente->nombre = $input['nombre'];
            $ObjCliente->apellidoP = $input['apellidoP'];
            $ObjCliente->apellidoM = $input['apellidoM'];
            $ObjCliente->telefono = $input['telefono'];
            $ObjCliente->direccion = $input['direccion'];
            $ObjCliente->ci = $input['ci'];
            $ObjCliente->email = $input['email'];
            $ObjCliente->activo = 1;
            $ObjCliente->save();
            echo 'ok';
        } else {
            return View::make('Cliente.new')->withErrors($validation);
        }
    }

    public function autocompletarCliente() {
        return Cliente::all()->toJson();
    }

}
