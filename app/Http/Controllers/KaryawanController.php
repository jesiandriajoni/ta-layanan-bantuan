<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Http\Requests\StoreKaryawanRequest;
use App\Http\Requests\UpdateKaryawanRequest;
use App\Models\Divisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cari=Karyawan::latest()->get();
        $data = [
            'karyawans' => $cari,
        ];

        return view('pages.karyawan.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // //
        // $divisis=Divisi::get();
        $id_divisi = Divisi::where('jenis_divisi','Non Teknis')->first();
        $data =[
            'divisi' => Divisi::where('nama_divisi','!=','Teknisi')->get(),


        ];
        return view('pages.karyawan.form',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKaryawanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'id_divisi'=> 'required',
            'foto'=>'required',
            'nama_karyawan'=>'required',
            'notelp'=>'required',

        ]);
        // variabel menampung foto
        $image = $request->file('foto');

        // untuk menampung gambar di folder upload
        $image->storeAs('karyawan',$image->hashName());

        Karyawan::create([
            'id_divisi'=>$request->id_divisi,
            'foto'=>$image->hashName(),
            'nama_karyawan'=>$request->nama_karyawan,
            'notelp'=>$request->notelp,

        ]);
        return redirect('/admin/karyawan')->with('success','Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data =[
            'divisi' =>Divisi::where('nama_divisi','!=','Teknisi')->get(),
            'karyawans' => Karyawan::find($id),
        ];
        return view('pages.karyawan.edit',
            $data
             //untuk mengambil data post sesuai dengan id yg di terima
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKaryawanRequest  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request,[
            'foto'=>['nullable'],
            'nama_karyawan'=>['required'],
            'notelp'=>['required'],
            'id_divisi'=>['required'],
        ]);
        $karyawans = Karyawan::find($id); //untuk memanggil data per id ketika di update

        $data=[
            'nama_karyawan'=>$request->nama_karyawan,
            'notelp'=>$request->notelp,
            'id_divisi'=>$request->id_divisi,
        ];
            $foto = $karyawans->foto;
            // membuat variabel $image dengan nilaiadalah image lama data yang diubah
            if ($request->hasFile('foto')) {
            // mengecek jika request memiliki file pada field image, jika tidak ada file maka operasi didalam in tidak akan diekseskusi
            Storage::delete($foto);
            // digunakan menghapus file lama karenatidak akan digunakan lagi, memanfaatkan variabel $image yang berisi pathfile sebelumnya
            $foto = $request->file('foto')->store('karyawan'); //mengoverride variabel $image dengan file baru yang diupload dan digunakan untuk mengupdate data.
            };
        if($request->hasFile('foto')){
            $data['foto']=$request->file('foto')->hashName();
            $request->file('foto')->storeAs('karyawan',$request->file('foto')->hashName());
        }
        $karyawans->update($data);
        return redirect('/admin/karyawan')->with('success','Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Karyawan::find($id)->delete();
        return redirect('/admin/karyawan')->with('success','Data berhasil dihapus.');
    }
}
