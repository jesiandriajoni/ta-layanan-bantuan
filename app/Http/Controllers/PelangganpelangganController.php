<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelangganpelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cari = Pelanggan::latest()->where('id',Auth::guard('pelanggan')->user()->id)->get();
        $data = [
            'pelanggans' => $cari,
        ];
        return view('pages.pelanggan.indexpelanggan', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [];
        return view('pages.pelanggan.formpelanggan', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_instansi' => 'required',
            'kode_pelanggan'=>'required',
            'kontak' => 'required',
            'alamat' => 'required',
            'username'=>'required',
            'password'=>'required',
            'email'=>'required',
        ]);
        Pelanggan::create([
            'nama_instansi' => $request->nama_instansi,
            'kode_pelanggan'=>$request->kode_pelanggan,
            'kontak' => $request->kontak,
            'alamat' => $request->alamat,
            'username'=>$request->username,
            'password'=>bcrypt($request->password),
            'email'=>$request->email,
        ]);
        return redirect('/pelanggan/pelanggan')->with('success','Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pelanggan=Pelanggan::get();
        $data=[
            'pelanggans'=>$pelanggan,
        ];
        return view('pages.pelanggan.editpelanggan', [
            'pelanggans' => Pelanggan::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate(($request), [
            'nama_instansi' => ['required'],
            'kontak' => ['required'],
            'alamat' => ['required'],
            'kode_pelanggan'=>['required'],
            'username'=>['required'],
            'password'=>['nullable'],
            'email'=>['required'],
        ]);
        $pelanggan = Pelanggan::find($id);

        $pelanggan->update([
            'kontak'=>$request->kontak,
            'alamat'=>$request->alamat,
            'kode_pelanggan'=>$request->kode_pelanggan,
            'username'=>$request->username,
            //ini namanya ternary of opration, cara kerjanya sama dengan if else
            'password'=>$request->password ? bcrypt($request->password) : $pelanggan->password,
            'email'=>$request->email,
        ]);
        return redirect('/pelanggan/pelanggan')->with('success','Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Pelanggan::find($id)->delete();
        return redirect('/pelanggan/pelanggan')->with('success','Data berhasil dihapus.');
    }
}
