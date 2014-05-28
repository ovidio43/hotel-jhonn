<?php

class TipoUsuarioController extends \BaseController {

    private $rules = array(
        'nombre' => 'Required'
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
        $input = Input::all();
        $validation = Validator::make($input, $this->rules);
        if (!$validation->fails()) {
            $ObjTipoUsuario = new TipoUsuario();
            $ObjTipoUsuario->nombre = $input['nombre'];
            $ObjTipoUsuario->descripcion = $input['descripcion'];
            $ObjTipoUsuario->save();
            return Redirect::to('sistema/tipo-usuario');
        } else {
            return Redirect::back()->withErrors($validation)->withInput();
        }
    }

    public function edit($id) {
        $ObjTipoUsuario = TipoUsuario::find($id);
        return View::make('TipoUsuario.edit')->with('TipoUsuario', $ObjTipoUsuario);
    }

    public function update($id) {
        $input = Input::all();
        $validation = Validator::make($input, $this->rules);
        if (!$validation->fails()) {
            $ObjTipoUsuario = TipoUsuario::find($id);
            $ObjTipoUsuario->nombre = $input['nombre'];
            $ObjTipoUsuario->descripcion = $input['descripcion'];
            $ObjTipoUsuario->save();
            return Redirect::to('sistema/tipo-usuario');
        } else {
            return Redirect::back()->withErrors($validation)->withInput();
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
