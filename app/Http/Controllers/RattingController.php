<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Ratting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RattingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ratting = Ratting::with([
            //berfungsi memanggil relasi ke pengaduan baru ke tabel pelangan
            'pengaduan.pelanggan',
            'teknisi',
        ])->latest()->get();
        $data=[
            'rattings'=>$ratting,
        ];
        return view('pages.feedback.indexadmin',$data);

    }
    public function indexteknisi()
    {
        //
        $ratting = Ratting::with([
            //berfungsi memanggil relasi ke pengaduan baru ke tabel pelangan
            'pengaduan.pelanggan',
            'teknisi',
        ])->latest()-> where('id_teknisi',Auth::guard('teknisi')->user()->id)->get();
        $data=[
            'rattings'=>$ratting,
        ];
        return view('pages.feedback.indexteknisi',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ratting = Ratting::get();
        $data=[
            'rattings'=>$ratting,
        ];
        return view('pages.ratting.form',$data);

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
        // dd($request->all());
        $request->validate([
            'id_pengaduan'=>'required',
            'nilai'=>'required',
            'deskripsi'=>'required',
        ]);
        // buat valiabel id_pengaduan untuk menampung nilai hasil dari decrypbase64
        // untuk membuat kode ratting dari id di encripci menjadi kode kode hash
        $id_pengaduan=base64_decode($request->id_pengaduan);
        $pengaduan=Pengaduan::find($id_pengaduan);

        Ratting::create([
            'id_pengaduan'=>$pengaduan->id,
            'nilai'=>$request->nilai,
            'deskripsi'=>$request->deskripsi,
            'id_teknisi'=>$pengaduan->id_teknisi,

        ]);
        //return diarahkan kembali ke halaman ratting yang sdg aktif
        return redirect('/pengaduan/feedback?kode='.$request->id_pengaduan);

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
    }

    public function ratting(Request $request){
        // untuk mengamnil kode id_pengadauan yang telah di encryp
        $id_pengaduan=base64_decode($request->kode);
        $ratting = Ratting::where('id_pengaduan',$id_pengaduan)->count();

        $data=[
            'rattings'=>$ratting,
        ];
        return view('pages.ratting.index',$data);
    }

    // funtion untuk menampilkan ratting dari pelanggan ke teknisi di halaman pelanggan
    public function rattingpelanggan(){
        // whereDoesntHave berarti memangil data pengaduan yang rattingnya belum ada, atau belum diisi pelanggan
        $penilaianpelanggan = Pengaduan::latest()->whereDoesntHave('ratting')
        ->where('status','done')->where('id_pelanggan', Auth::guard('pelanggan')->user()->id)->get();
        $data = [
            'pengaduans' => $penilaianpelanggan,
        ];
        return view('pages.feedback.penilaiandaripelanggan', $data);
    }
    // function menampilkan formpenilaian dari pelanggan
    public function datapenilaian($id)
    {
        $penilaianpelanggan = Pengaduan::find($id);
        $data = [
            'datapenilaian' => $penilaianpelanggan];
        return view('pages.feedback.formpenilaian',$data);


    }
    public function datapenilianstore(Request $request)
    {
        //
        // dd($request->all());
        $request->validate([
            'id_pengaduan'=>'required',
            'nilai'=>'required',
            'deskripsi'=>'required',
        ]);
        // buat valiabel id_pengaduan untuk menampung nilai hasil dari decrypbase64
        // untuk membuat kode ratting dari id di encripci menjadi kode kode hash
        $id_pengaduan=$request->id_pengaduan;
        $pengaduan=Pengaduan::find($id_pengaduan);

        Ratting::create([
            'id_pengaduan'=>$pengaduan->id,
            'nilai'=>$request->nilai,
            'deskripsi'=>$request->deskripsi,
            'id_teknisi'=>$pengaduan->id_teknisi,

        ]);
        //return diarahkan kembali ke halaman ratting yang sdg aktif
        return redirect('pelanggan/penilaian');

    }



}
