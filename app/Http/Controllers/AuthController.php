<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('pages.login.index');
    }

    public function actionlogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        // dd($credentials);
        if(Auth::guard('admin')->attempt(array_merge($credentials,['level_id'=>1]))){

            return redirect()->intended('/admin/dashboard');
        }
        elseif(Auth::guard('teknisi')->attempt($credentials)){
            return redirect('/teknisi/dashboard');
        }
        elseif(Auth::guard('supervisor')->attempt(array_merge($credentials,['level_id'=>2]))){
            return redirect('/supervisor/dashboard');
        }
        elseif(Auth::guard('pelanggan')->attempt($credentials)){
            return redirect('/pelanggan/dashboard');
        }
        else{
            return redirect()->back()->with('loginError', 'Gagal Login!');
            // return ('ayam');
        }
        return redirect()->back()->with('loginError', 'Gagal Login!');
    }

    // public function register()
    // {

    // }

    // public function actionregister(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'username' => 'required|unique:users,username',
    //         'password' => 'required'
    //     ]);

    //     User::create($credentials);
    //     return back()->with(['RegisterError'=> 'Gagal Register!']);

    // }

    public function logout()
    {
        Auth::guard('admin')->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
