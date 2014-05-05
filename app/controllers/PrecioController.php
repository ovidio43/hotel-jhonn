<?php

class PrecioController extends \BaseController {

    private $rules = array(
        'monto' => 'Required',
        'id_precio' => 'Required'
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

    
    /***retornar json con  ****/
    public function index() {
        $ObjPrecio = Precio::all();
        return View::make('Precio.index')->with('Precio', $ObjPrecio);
    }

    public function create() {
        return View::make('Precio.create');
    }

    public function store() {
        $ObjPrecio = new Precio;
        $input = Input::all();
        $ObjPrecio->monto = $input['monto'];
        $ObjPrecio->id_moneda = $input['id_moneda'];
        $ObjPrecio->id_tipo_habitacion = $input['id_tipo_habitacion'];
        $validation = Validator::make($input, $this->rules, $this->message);
        if (!$validation->fails()) {
            $ObjPrecio->save();
            return Redirect::to('administracion/precio')->with('Precio', Input::all());
        } else {
            return View::make('Precio.create')->withErrors($validation);
        }
    }

    public function edit($id) {
        $ObjPrecio = Precio::find($id);
        return View::make('Precio.edit')->with('Precio', $ObjPrecio);
    }

    public function update($id) {
        $input = Input::all();
        $ObjPrecio = Precio::find($id);
        $ObjPrecio->monto = $input['monto'];
        $ObjPrecio->id_moneda = $input['id_moneda'];
        $ObjPrecio->id_tipo_habitacion = $input['id_tipo_habitacion'];
        $validation = Validator::make($input, $this->rules, $this->message);
        if (!$validation->fails()) {
            $ObjPrecio->save();
            return Redirect::to('administracion/precio')->with('Precio', $input);
        } else {
            return View::make('Precio.edit')->with('Precio', $ObjPrecio)->withErrors($validation);
        }
    }

    public function destroy($id) {
        $ObjPrecio = Precio::find($id);
        $ObjPrecio->delete();
        return Redirect::to('administracion/precio');
    }

}
