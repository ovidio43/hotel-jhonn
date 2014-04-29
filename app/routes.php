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


Route::resource('administracion/tipo-usuario', 'TipoUsuarioController');
Route::resource('administracion/trabajador', 'TrabajadorController');
Route::resource('administracion/usuario', 'UsuarioController');
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

