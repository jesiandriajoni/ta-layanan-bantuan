<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupervisiorController extends Controller
{
    //
    public function login()
    {
        return view('pages.login.loginsupervisior');
    }

    public function actionlogin(Request $request)
    {
        //dd($request->all());
        $credentials = $request-> validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::guard('supervisor')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/supervisor/dashboard');
        }
    }

    public function logout()
    {
        Auth::guard('supervisor')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/supervisor/login');
    }
}
