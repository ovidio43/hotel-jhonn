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
        $input = Input::all();
        $validation = Validator::make($input, $this->rules, $this->message);
        if (!$validation->fails()) {
            $ObjMoneda = new Moneda;
            $ObjMoneda->nombre = $input['nombre'];
            $ObjMoneda->pais = $input['pais'];
            $ObjMoneda->simbolo = $input['simbolo'];
            $ObjMoneda->save();
            return Redirect::to('sistema/parametros/moneda')->with('Moneda', Input::all());
        } else {
            return View::make('Parametros.Moneda.create')->withErrors($validation);
        }
    }

    public function edit($id) {
        $ObjMoneda = Moneda::find($id);
        return View::make('Parametros.Moneda.edit')->with('Moneda', $ObjMoneda);
    }

    public function update($id) {
        $input = Input::all();


        $validation = Validator::make($input, $this->rules, $this->message);
        if (!$validation->fails()) {
            $ObjMoneda = Moneda::find($id);
            $ObjMoneda->nombre = $input['nombre'];
            $ObjMoneda->pais = $input['pais'];
            $ObjMoneda->simbolo = $input['simbolo'];
            $ObjMoneda->save();
            return Redirect::to('sistema/parametros/moneda')->with('Moneda', $input);
        } else {
            return View::make('Parametros.Moneda.edit')->with('Moneda', $ObjMoneda)->withErrors($validation);
//            return Redirect::back()->withErrors($validation);
        }
    }

    public function destroy($id) {
        $ObjMoneda = Moneda::find($id);
        $ObjMoneda->delete();
        return Redirect::to('sistema/parametros/moneda');
    }

    public function getList($numPrices) {
        $ObjMoneda = Moneda::orderBy('nombre', 'asc')->get();
        return View::make('Parametros.Moneda.prices')->with('Moneda', $ObjMoneda)->with('numPrices', $numPrices);
    }

}
