<?php

class MonedaController extends \BaseController {

    private $rules = array(
        'nombre' => 'Required',
        'pais' => 'Required',
        'simbolo' => 'Required'
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
        $ObjMoneda = Moneda::all();
        return View::make('Parametros.Moneda.index')->with('Moneda', $ObjMoneda);
    }

    public function create() {
        return View::make('Parametros.Moneda.create');
    }

    public function store() {
        $ObjMoneda = new Moneda;
        $input = Input::all();
        $ObjMoneda->nombre = $input['nombre'];
        $ObjMoneda->pais = $input['pais'];
        $ObjMoneda->simbolo = $input['simbolo'];        
        $validation = Validator::make($input, $this->rules, $this->message);
        if (!$validation->fails()) {
            $ObjMoneda->save();
            return Redirect::to('sistema/parametros/moneda')->with('Moneda', Input::all());
        } else {
            return View::make('Parametros.Moneda.create')->withErrors($validation);
//            return Redirect::back()->withErrors($validation);
        }
    }

    public function edit($id) {
        $ObjMoneda = Moneda::find($id);
        return View::make('Parametros.Moneda.edit')->with('Moneda', $ObjMoneda);
    }

    public function update($id) {
        $input = Input::all();
        $ObjMoneda = Moneda::find($id);
        $ObjMoneda->nombre = $input['nombre'];
        $ObjMoneda->pais = $input['pais'];
        $ObjMoneda->simbolo = $input['simbolo']; 
        $validation = Validator::make($input, $this->rules, $this->message);
        if (!$validation->fails()) {
            $ObjMoneda->save();
            return Redirect::to('sistema/parametros/moneda')->with('Moneda', $input);
        } else {    
            return View::make('Parametros.Moneda.edit')->with('Moneda', $ObjMoneda)->withErrors($validation);
//            return Redirect::back()->withErrors($validation);
        }
    }

    public function destroy($id) {
        if ($id != 5) {
            $ObjMoneda = Moneda::find($id);
            $ObjMoneda->delete();
        }
        return Redirect::to('sistema/parametros/moneda');
    }

}
