<?php

class TipoUsuarioController extends \BaseController {

    private $rules = array(
        'nombre' => 'Required'
    );
    private $message = array(
        'required' => 'Campo Obligatorio',
    );

    public function __construct() {
        $this->beforeFilter(function() {
            if (!Auth::check()) {
                return Redirect::to('/');
            }
        });
    }

    public function index() {
        $ObjTipoUsuario = TipoUsuario::where('id', '!=', '1')->get();
        return View::make('TipoUsuario.index')->with('TipoUsuario', $ObjTipoUsuario);
    }

    public function create() {
        return View::make('TipoUsuario.create');
    }

    public function store() {
        $ObjTipoUsuario = new TipoUsuario();
        $input = Input::all();
        $ObjTipoUsuario->nombre = $input['nombre'];
        $ObjTipoUsuario->descripcion = $input['descripcion'];
        $validation = Validator::make($input, $this->rules, $this->message);
        if (!$validation->fails()) {
            $ObjTipoUsuario->save();
            return Redirect::to('sistema/tipo-usuario')->with('TipoUsuario', Input::all());            
        } else {
            return Redirect::back()->withErrors($validation);
        }
    }


    public function edit($id) {
        $ObjTipoUsuario = TipoUsuario::find($id);
        return View::make('TipoUsuario.edit')->with('TipoUsuario', $ObjTipoUsuario);
    }

    public function update($id) {
        $input = Input::all();
        $ObjTipoUsuario = TipoUsuario::find($id);
        $ObjTipoUsuario->nombre = $input['nombre'];
        $ObjTipoUsuario->descripcion = $input['descripcion'];
        $validation = Validator::make($input, $this->rules, $this->message);
        if (!$validation->fails()) {
            $ObjTipoUsuario->save();
            return Redirect::to('sistema/tipo-usuario')->with('TipoUsuario', $input);
        } else {
            return Redirect::back()->withErrors($validation);
        }
    }

    public function destroy($id) {
        if ($id != 5) {
            $ObjTipoUsuario = TipoUsuario::find($id);
            $ObjTipoUsuario->delete();
        }
        return Redirect::to('sistema/tipo-usuario');
    }

}
