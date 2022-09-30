<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Mail\EmaildoneNotifikasi;
use App\Mail\EmailNotifikasi;
use App\Models\Pelanggan;
use App\Models\Pengaduan;
use App\Models\Teknisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PengaduansupervisorController extends Controller
{
    public function index(Request $request)
    {
        //
        $cari = Pengaduan::latest()->get();
        if($request->status){
            // di dalam kurung buka dan tutup ada array relasi
            $cari = Pengaduan::with(['pelanggan'])->where('status',$request->status)->latest()->get();
        }
        $data = [
            'pengaduans' => $cari,
        ];
        return view('pages.pengaduan.indexsupervisor', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //variabel untuk data pengaduan
        $pengaduan = Pengaduan::get();

        //variabel untuk data jenis pengaduan
        $pelanggan=Pelanggan::get();
        // $jenis_pengaduan = Jenispengaduan::get();
        $data = [
            // 'jenis_pengaduan'=>$jenis_pengaduan,
            'pengaduans' => $pengaduan,
            'pelanggan'=> $pelanggan,
        ];
        return view('pages.pengaduan.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePengaduanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
   {

   }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {}

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePengaduanRequest  $request
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {}


    public function cetakpengaduan(Request $request)
    {
        //
        if($request->mulai){
            $pengaduan= Pengaduan::where('status','done')->whereBetween('tanggal',[$request->mulai, $request->sampai])->get();
        }
        else
            {
                $pengaduan=Pengaduan::where('status','done')->get();
             }
        $data = [


            'pengaduans' => $pengaduan,
            // untuk mengambil data Post sesuai
            //dengan id yang diterima

        ];

        // dd($data);

        return view('pages.kopsurat.indexsupervisor', $data);
    }

}
