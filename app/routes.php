<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

//Route::get('/', function() {
//    return View::make('hello');
//});

Route::resource('sistema/usuario', 'UsuarioController');
Route::resource('sistema/tipo-usuario', 'TipoUsuarioController');

Route::get('sistema/parametros', function() {
    if (Auth::check()) {
        return View::make('Parametros.parametros');
    } else {
        return Redirect::to('/');
    }
});

Route::resource('sistema/parametros/moneda', 'MonedaController');

Route::resource('administracion/trabajador', 'TrabajadorController');
Route::resource('administracion/cliente', 'ClienteController');
Route::resource('administracion/habitacion', 'HabitacionController');
Route::resource('administracion/tipo-habitacion', 'TipoHabitacionController');

Route::resource('/', 'LoginController');
Route::resource('login', 'LoginController');

Route::get('administracion', function() {
    if (Auth::check()) {
        return View::make('administracion');
    } else {
        return Redirect::to('/');
    }
});
Route::get('sistema', function() {
    if (Auth::check()) {
        return View::make('sistema');
    } else {
        return Redirect::to('/');
    }
});
Route::get('reservasiones', function() {
    if (Auth::check()) {
        return View::make('reservasiones');
    } else {
        return Redirect::to('/');
    }
});

