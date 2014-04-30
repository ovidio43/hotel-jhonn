<?php

class LoginController extends \BaseController {

    public function index() {
//        $this->beforeFilter(function() {
        if (!Auth::check()) {
            return View::make('Login.index');
//                return Redirect::to('/');
        } else {
            return View::make('Login.inicio');
        }
//        });
    }

    public function store() {
        $userdata = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );

        if (Auth::attempt($userdata, true)) {
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
