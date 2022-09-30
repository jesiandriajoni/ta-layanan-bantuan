<?php

namespace App\Http\Controllers;

use App\Models\Teknisi;
use App\Http\Requests\StoreTeknisiRequest;
use App\Http\Requests\UpdateTeknisiRequest;
use App\Models\Divisi;
use Illuminate\Http\Request;

class TeknisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cari = Teknisi::latest()->get();
        $data = [
            'teknisis' => $cari,
        ];
        return view('pages.teknisi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $id_divisi = Divisi::where('nama_divisi','Teknis')->first();
        // $divisi=Divisi::where('id_divisi','=',$id_divisi->id)->get();
        $divisi= Divisi::get();

        $data = [
            //kenapa divisis??
            //karena kita meengambil data relasi dari tabel divisi maka model yang di pangaggil model
            'divisis' => $divisi,
        ];
        return view('pages.teknisi.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTeknisiRequest  $request
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
        //lokasi tempat menyimpan foto
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
        return redirect('/admin/teknisi')->with('success', 'Data berhasil disimpan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teknisi  $teknisi
     * @return \Illuminate\Http\Response
     */
    public function show(Teknisi $teknisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teknisi  $teknisi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $id_divisi = Divisi::where('nama_divisi','Teknis')->first();
        // $divisi=Divisi::where('id_divisi','=',$id_divisi->id)->get();
        $divisi=Divisi::get();
        //
        return view('pages.teknisi.edit', [
            'divisis' => $divisi,
            'teknisis' => Teknisi::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTeknisiRequest  $request
     * @param  \App\Models\Teknisi  $teknisi
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
            'password'=>['nullable'], // pada saat diedit data, boleh di kosongkan jika tdk mengubah password
            'email'=>['required'],
        ]);
        $teknisis = Teknisi::find($id);
        $data = [
            'nama_teknisi' => $request->nama_teknisi,
            'notelp' => $request->notelp,
            // 'id_divisi' => $request->id_divisi,
            'username'=> $request->username,
            'password'=>$request->password ? bcrypt($request->password) : $teknisis->password, // mengubah bentuk data pada saat disimpan menjadi hasil enskipsi
            'email'=>$request->email,
        ];
        $foto = $teknisis->foto;
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->hashName();
            $request->file('foto')->storeAs('teknisi', $request->file('foto')->hashName());
        }
        $teknisis->update($data);
        return redirect('/admin/teknisi')->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teknisi  $teknisi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Teknisi::find($id)->delete();
        return redirect('/admin/teknisi')->with('success', 'Data berhasil dihapus.');
    }
}
