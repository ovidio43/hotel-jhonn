<?php

class UsuarioController extends \BaseController {

    private $rules = array(
        'email' => 'required|unique:usuario|email',
        'password' => 'required|min:6',
        'id_trabajador' => 'required',
        'id_tipo_usuario' => 'required',
    );
    private $message = array(
        'required' => 'Campo Obligatorio.',
        'min' => 'Acepta 6 carácteres o mas.',
        'unique' => 'El usuario ya existe.'
    );

    public function __construct() {
        $this->beforeFilter(function() {
            if (!Auth::check()) {
                return Redirect::to('/');
            }
        });
    }

    public function index() {
        $ObjUsuario = Usuario::all();
        return View::make('Usuario.index')->with('Usuario', $ObjUsuario);
    }

    public function create() {
        return View::make('Usuario.create');
    }

    public function store() {
        $ObjUsuario = new Usuario;
        $input = Input::all();
        $ObjUsuario->email = $input['email'];
        $ObjUsuario->password = Hash::make($input['password']);
//        $ObjUsuario->password =$input['password'];
        $ObjUsuario->fecha_creacion = date('Y-m-d');
        $ObjUsuario->id_trabajador = $input['id_trabajador'];
        $ObjUsuario->id_tipo_usuario = $input['id_tipo_usuario'];
        $ObjUsuario->acitvo = 1;
        $validation = Validator::make($input, $this->rules, $this->message);
        if (!$validation->fails()) {
            $ObjUsuario->save();
            return Redirect::to('sistema/usuario')->with('Usuario', Input::all());
        } else {
            return Redirect::back()->withErrors($validation);
        }
    }

    public function show($id) {
        $ObjUsuario = Usuario::find($id);
        return View::make('Usuario.show')->with('Usuario', $ObjUsuario);
    }

    public function edit($id) {
        $ObjUsuario = Usuario::find($id);
        return View::make('Usuario.edit')->with('Usuario', $ObjUsuario);
    }

    public function update($id) {
        $input = Input::all();
        $ObjUsuario = Usuario::find($id);
        if (Input::has('password')) {
            $ObjUsuario->password = Hash::make($input['password']);
//            $ObjUsuario->password = $input['password'];
        }
        $ObjUsuario->id_trabajador = $input['id_trabajador'];
        $ObjUsuario->id_tipo_usuario = $input['id_tipo_usuario'];

        $curretRules = array(
            'password' => 'min:6',
            'id_trabajador' => 'required',
            'id_tipo_usuario' => 'required'
        );
        $validation = Validator::make($input, $curretRules, $this->message);

        if (!$validation->fails()) {
            $ObjUsuario->save();
            return Redirect::to('sistema/usuario')->with('Usuario', $input);
        } else {
            return Redirect::back()->withErrors($validation);
        }
    }

    public function destroy($id) {
        $ObjUsuario = Usuario::find($id);
        $ObjUsuario->delete();
        return Redirect::to('sistema/usuario');
    }

}
