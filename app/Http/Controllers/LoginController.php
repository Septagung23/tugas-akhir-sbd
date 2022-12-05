<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('/detail');
        } else {
            return view('login');
        }
    }

    public function actionLogin(Request $request)
    {
        $data = [
            'username'  => $request->username,
            'password'  => $request->password
        ];

        if (Auth::attempt($data)) {
            return redirect('/detail');
        } else {
            Session::flash('error', 'Username atau Password yang anda masukkan salah');
            return redirect('/');
        }
    }

    public function actionLogout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}