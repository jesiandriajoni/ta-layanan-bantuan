<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Http\Requests\StoreDivisiRequest;
use App\Http\Requests\UpdateDivisiRequest;
use App\Models\Karyawan;
use App\Models\Teknisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cari=Divisi::latest()->get();
        $data = [
            'divisis' => $cari,
        ];

        return view('pages.divisi.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //jika ada relasi data di relasi harus di isi
        $cari=Divisi::get();
        $data =[
            'divisis' => $cari,

        ];
        return view('pages.divisi.form',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDivisiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'id_divisi'=>'nullable',
            'nama_divisi'=>'required',
            'jenis_divisi'=>'required',
        ]);
        Divisi::create([
            'id_divisi'=>$request->id_divisi,
            'nama_divisi'=>$request->nama_divisi,
            'jenis_divisi'=>$request->jenis_divisi,
        ]);
        return redirect('/admin/divisi')->with('success','Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function show(Divisi $divisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('pages.divisi.edit',[

            'divisis' => Divisi::get(),
            // PENAMBAHAN 2 BARIS CODINGAN YANG DI ATAS
            'divisi' => Divisi::find($id), //untuk mengambil data post sesuai dengan id yg di terima
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDivisiRequest  $request
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'id_divisi'=>['nullable'],
            'nama_divisi'=>['required'],
            'jenis_divisi'=>['required'],
        ]);
        $divisi = Divisi::find($id); //untuk memanggil data per id ketika di update

        $divisi->update([
            'id_divisi'=>$request->id_divisi,
            'nama_divisi'=>$request->nama_divisi,
            'jenis_divisi'=>$request->jenis_divisi,
        ]);
        return redirect('/admin/divisi')->with('success','Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Divisi::find($id)->delete();
        return redirect('/admin/divisi')->with('success','Data berhasil dihapus.');
    }
}
