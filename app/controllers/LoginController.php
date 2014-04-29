<?php

class LoginController extends \BaseController {

//    function __construct() {
//        // ...
//        $this->beforeFilter('auth', array('except' => array('index')));
//        // ...
//    }

    public function index() {
        if (Auth::check()) {
            return View::make('Login.inicio');
        } else {
            return View::make('Login.index');
        }
    }

    public function store() {
        $userdata = array(
            'login' => Input::get('login'),
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
