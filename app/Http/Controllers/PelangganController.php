<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //untuk menampilkan data dipada tabel
        $cari = Pelanggan::latest()->get();
        $data = [
            'pelanggans' => $cari,
        ];
        return view('pages.pelanggan.index', $data);
    }
    public function indexsupervisor()
    {
        //untuk menampilkan data dipada tabel
        $cari = Pelanggan::latest()->get();
        $data = [
            'pelanggans' => $cari,
        ];
        return view('pages.pelanggan.indexsupervisor', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $data = [
            'kode_pelanggan' => $this->kode_pelanggan(),

        ];
        return view('pages.pelanggan.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePelangganRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
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
        return redirect('/admin/pelanggan')->with('success','Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('pages.pelanggan.edit', [
            'pelanggans' => Pelanggan::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePelangganRequest  $request
     * @param  \App\Models\Pelanggan  $pelanggan
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
            'nama_instansi'=>$request->nama_instansi,
            'kontak'=>$request->kontak,
            'alamat'=>$request->alamat,
            'kode_pelanggan'=>$request->kode_pelanggan,
            'username'=>$request->username,
            //ini namanya ternary of opration, cara kerjanya sama dengan if else
            'password'=>$request->password ? bcrypt($request->password) : $pelanggan->password,
            'email'=>$request->email,
        ]);
        return redirect('/admin/pelanggan')->with('success','Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Pelanggan::find($id)->delete();
        return redirect('/admin/pelanggan')->with('success','Data berhasil dihapus.');
    }

    public function kode_pelanggan()
    {
        $kode = Pelanggan::count();

        return 'P'. str_pad($kode + 1, 3, "0", STR_PAD_LEFT);
    }
}
