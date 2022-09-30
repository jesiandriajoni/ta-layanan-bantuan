<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthpelangganController extends Controller
{
    //
    public function login()
    {
        return view('pages.login.loginpelanggan');
    }

    public function actionlogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::guard('pelanggan')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/pelanggan/dashboard');
        }
        return back()->with('loginError', 'Gagal Login!');
    }


    public function register()
    {
        return view('pages.register.index');
    }
    // berfungsi untuk menampung semua data yang dikirim pada saat pengisikan data di form
    public function actionRegister(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        // berfungsi untuk menentukan user yang register id nya berapa
        $validated['level_id'] = 4;
        //membuat password tervalidasi
        $validated['password'] = bcrypt($validated['password']);
        // menyimpan data ke model user dari $validated
        // $user berfungsi untuk menampung data hasil validated
        $user = User::create($validated);

        if($user){
            return redirect('/pelanggan/loginpelanggan')->with('success','Akun anda berhasil di daftarkan');
        }
        return redirect('register')->with('error','Akun anda gagal di daftarkan');
    }
    public function logout()
    {
        Auth::guard('pelanggan')->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/pelanggan/loginpelanggan');
    }
    public function sendemail(){

    }
}
