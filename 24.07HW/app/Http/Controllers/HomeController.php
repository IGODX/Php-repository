<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function register()
    {
        return view("registration");
    }

    public function showuser(Request $request)
    {
        if (!$request->exists('_token')) {
            return view('validationErrors.showError')->with("data", "Token error!");
        }
        $password = $request->input('password');
        $passwordAgain = $request->input('passwordagain');
        if ($password != $passwordAgain) {
            return view('validationErrors.showError')->with("data", "Passwords don't match!");
        }
        $login = $request->input('login');
        $email = $request->input('email');
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $age = $request->input('age');
        if ($age < 18) {
            return view('validationErrors.showError')->with("data", "You must be 18 years or older, to register!");
        }
        return view('userInfo')->with("username", $login)->with("login", $email)->with("age", $age)->with("password", $hashedPassword);
    }
}
