<?php

class UsuarioController extends \BaseController {

    private $rules = array(
        'email' => 'required|unique:usuario|email',
        'password' => 'required|min:6',
        'id_trabajador' => 'required',
        'id_tipo_usuario' => 'required',
    );

    public function __construct() {
        $this->beforeFilter(function() {
            if (!Auth::check()) {
                return Redirect::to('/');
            }
        });
    }

    public function index() {
        $ObjUsuario = Usuario::where('id_tipo_usuario', '!=', '1')->get();
        return View::make('Usuario.index')->with('Usuario', $ObjUsuario);
    }

    public function create() {
        return View::make('Usuario.create');
    }

    public function store() {

        $input = Input::all();

        $validation = Validator::make($input, $this->rules);
        if (!$validation->fails()) {
            $ObjUsuario = new Usuario;
            $ObjUsuario->email = $input['email'];
            $ObjUsuario->password = Hash::make($input['password']);
            $ObjUsuario->fecha_creacion = date('Y-m-d');
            $ObjUsuario->id_trabajador = $input['id_trabajador'];
            $ObjUsuario->id_tipo_usuario = $input['id_tipo_usuario'];
            $ObjUsuario->activo = 1;
            $ObjUsuario->save();
            return Redirect::to('sistema/usuario');
        } else {
            return Redirect::back()->withErrors($validation)->withInput();
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
        $curretRules = array(
            'password' => 'min:6',
            'id_trabajador' => 'required',
            'id_tipo_usuario' => 'required'
        );
        $validation = Validator::make($input, $curretRules, $this->message);
        if (!$validation->fails()) {
            $ObjUsuario = Usuario::find($id);
            if (Input::has('password')) {
                $ObjUsuario->password = Hash::make($input['password']);
            }
            $ObjUsuario->id_trabajador = $input['id_trabajador'];
            $ObjUsuario->id_tipo_usuario = $input['id_tipo_usuario'];
            $ObjUsuario->save();
            return Redirect::to('sistema/usuario');
        } else {
            return Redirect::back()->withErrors($validation)->withInput();
        }
    }

    public function destroy($id) {
        $ObjUsuario = Usuario::find($id);
        $ObjUsuario->delete();
        return Redirect::to('sistema/usuario');
    }

}
