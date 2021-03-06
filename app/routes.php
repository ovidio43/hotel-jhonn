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



Route::resource('administracion/trabajador', 'TrabajadorController');
Route::resource('administracion/cliente', 'ClienteController');
Route::get('cliente/nuevo', 'ClienteController@nuevoCliente');
Route::post('cliente/guardar', 'ClienteController@guardarCliente');
Route::get('reservaciones/cliente/autocompletar', 'ClienteController@autocompletarCliente');

Route::resource('administracion/habitacion', 'HabitacionController');
Route::resource('administracion/tipo-habitacion', 'TipoHabitacionController');
Route::resource('reservaciones', 'ReservaController');
Route::resource('reservaciones/detail', 'ReservaController@saveReservation');

/* * ****************pticiones ajax************************ */
Route::resource('sistema/parametros/moneda', 'MonedaController');
Route::get('administracion/moneda/{numPrices}', 'MonedaController@getList');
Route::get('administracion/tipo-habitacion/delete/price/{idprecio}', 'PrecioController@deletePrecio');
Route::get('reservaciones/realizar-cobro/{id_reserva}', 'ReservaController@realizarCobro');
Route::post('reservaciones/cobrar/{id_reserva}', 'ReservaController@confirmarCobro');
Route::get('reservaciones/liberar/{id_reserva}', 'ReservaController@liberar');
Route::get('reservaciones/pasar-cuenta/{id_reserva}', 'CuentaPorCobrarController@guardar');
/* * **************************************************************** */

/* * **********reportes******************* */
Route::get('administracion/reporte', function() {
    if (Auth::check()) {
        return View::make('Reporte.main');
    } else {
        return Redirect::to('/');
    }
});
Route::post('administracion/reporte/reservas', function() {
    if (Auth::check()) {
        return View::make('Reporte.reporte')->with('Input', Input::all());
    } else {
        return Redirect::to('/');
    }
});
/* * *********************************** */
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
//Route::get('reservaciones', function() {
//    if (Auth::check()) {
//        return View::make('reservaciones');
//    } else {
//        return Redirect::to('/');
//    }
//});

