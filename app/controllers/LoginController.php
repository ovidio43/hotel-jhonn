<?php

class LoginController extends \BaseController {

//    function __construct() {
//        // ...
//        $this->beforeFilter('auth', array('except' => array('index')));
//        // ...
//    }
//    public function __construct() {
//        $this->beforeFilter(function() {
//            if (Auth::check()) {
//               return View::make('Login.inicio');
//            }
//        });
//    }

    public function index() {
        return View::make('Login.index');
    }

    public function store() {
        $userdata = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );

        if (Auth::attempt($userdata, true)) {
//            Session::put('userID', Auth::user()->id);
            return View::make('Login.inicio');
        } else {
            return Redirect::back();
        }
    }

    public function destroy($id) {
        if (Auth::check()) {
            Auth::logout();
        }
        return Redirect::to('/');
    }

}
