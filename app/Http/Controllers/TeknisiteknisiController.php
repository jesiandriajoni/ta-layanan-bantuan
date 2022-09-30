<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Teknisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeknisiteknisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cari = Teknisi::latest()->where('id',Auth::guard('teknisi')->user()->id)->get();
        $data = [
            'teknisis' => $cari,
        ];
        return view('pages.teknisi.indexteknisi', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $divisi=Divisi::get();

        $data = [
            //kenapa divisis??
            //karena kita meengambil data relasi dari tabel divisi maka model yang di pangaggil model
            'divisis' => $divisi,
        ];
        return view('pages.teknisi.formteknisi', $data);
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
            'username'=>'required',
            'password'=>'required',
            'email'=>'required',
            // 'id_divisi' => 'required',
            'foto' => 'required',
            'nama_teknisi' => 'required',
            'notelp' => 'required',
        ]);
        $image = $request->file('foto');
        $image->storeAs('teknisi', $image->hashName());

        Teknisi::create([
            'username'=> $request->username,
            'password'=>bcrypt($request->password),
            'email'=>$request->email,
            // 'id_divisi' => $request->id_divisi,
            'foto' => $image->hashName(),
            'nama_teknisi' => $request->nama_teknisi,
            'notelp' => $request->notelp,
        ]);
        return redirect('/teknisi/teknisi')->with('succes', 'Data berhasil disimpan');

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
        $divisi=Divisi::get();
        //
        return view('pages.teknisi.editteknisi', [
            'divisis' => $divisi,
            'teknisis' => Teknisi::find($id),
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
        $this->validate($request, [
            'foto' => ['nullable'],
            'nama_teknisi' => ['required'],
            'notelp' => ['required'],
            // 'id_divisi' => ['required'],
            'username'=>['required'],
            'password'=>['nullable'],
            'email'=>['required'],
        ]);
        $teknisis = Teknisi::find($id);
        $data = [
            'nama_teknisi' => $request->nama_teknisi,
            'notelp' => $request->notelp,
            // 'id_divisi' => $request->id_divisi,
            'username'=> $request->username,
            'password'=>$request->password ? bcrypt($request->password) : $teknisis->password,
            'email'=>$request->email,
        ];
        $foto = $teknisis->foto;
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->hashName();
            $request->file('foto')->storeAs('teknisi', $request->file('foto')->hashName());
        }
        $teknisis->update($data);
        return redirect('/teknisi/teknisi')->with('success', 'Data berhasil diupdate.');
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
        Teknisi::find($id)->delete();
        return redirect('/teknisi/teknisi')->with('success', 'Data berhasil dihapus.');
    }
}
