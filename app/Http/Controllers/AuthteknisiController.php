<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthteknisiController extends Controller
{
      //
      public function login()
      {
          return view('pages.login.loginteknisi');
      }

      public function actionlogin(Request $request)
      {
          $credentials = $request->validate([
              'username' => 'required',
              'password' => 'required'
          ]);

          if(Auth::guard('teknisi')->attempt($credentials)){
              $request->session()->regenerate();
              return redirect()->intended('/teknisi/dashboard');
          }
          return back()->with('loginError', 'Gagal Login!');
      }



      public function logout()
      {
          Auth::guard('teknisi')->logout();

          request()->session()->invalidate();

          request()->session()->regenerateToken();

          return redirect('/loginteknisi/login');
      }
}
