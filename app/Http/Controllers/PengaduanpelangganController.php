<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Mail\Emailteknisi;
use App\Models\Jenispengaduan;
use App\Models\Pelanggan;
use App\Models\Pengaduan;
use App\Models\Teknisi;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Psy\Command\WhereamiCommand;

class PengaduanpelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cari = Pengaduan::latest()->where('id_pelanggan', Auth::guard('pelanggan')->user()->id)->get();
        $data = [
            'pengaduans' => $cari,
        ];
        return view('pages.pengaduan.indexpelanggan', $data);
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
        return view('pages.pengaduan.formpelanggan', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            // 'id_pelanggan'=>'required',
            'keterangan' => 'required',
            'pengaduan'=>'required',
            'foto' => 'nullable',  // 'tanggal' => 'required',
            'id_teknisi' => 'nullable',
            'timestart' => 'nullable',  // 'timesend'=>'nullabe',status' => 'nullable'
        ]);
        // nilai awal nama gambar
        $namagambar = null;
        // $foto = $pengaduans->foto;
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $image->storeAs('pengaduan', $image->hashName());
            $namagambar= $image->hashName();  // variabel menampung  nama gambar
        }
        $pengaduan = Pengaduan::create([

            'id_pelanggan'=>Auth::guard('pelanggan')->user()->id,
            'pengaduan'=>$request->pengaduan,
            'keterangan' => $request->keterangan,
            'tanggal' => date('Y-m-d'),
            'id_teknisi' => $request->id_teknisi,
            'timestart' => $request->timestart,
            // 'timesend'=>$request->timesend,
            // 'status' => $request->status,
            'status'=>'waiting',
            'foto'=>$namagambar,
        ]);

        $teknisi=Teknisi::get();
        // Mail::to($pengaduan->teknisi->email)->send(new Emailteknisi($pengaduan)); untuk mengirim notifikasi pada saat pelanngan membuat pengaduan
        foreach($teknisi as $item){
            // nutuk mengirimkan job queue ke emailteknisi
            $emailteknisi=Teknisi::find($item->id);
            dispatch(  new SendEmailJob($pengaduan,$emailteknisi));
        }


        // dd($teknisi);
        // dispatch(new SendEmailJob($pengaduan, $emailteknisi));

        // foreach($teknisi as $item){
        //     //unutuk mengirimkan job queue ke emailteknisi
        //     $emailteknisi=Teknisi::find($item->id);
        //     dispatch(  new SendEmailJob($pengaduan,$emailteknisi));
        // }
        return redirect('/pelanggan/pengaduan')->with('success', 'Data berhasil ditambahkan.');
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
        $pengaduans=Pengaduan::find($id);
        $pelanggan=Pelanggan::get();
        $data = [
            // 'jenis_pengaduan'=>$jenis_pengaduan,
            'pengaduans'=>$pengaduans,
            'pelanggan'=>$pelanggan,
        ];
        return view('pages.pengaduan.editpelanggan', $data);
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
            'id_pelanggan'=>['required'],
            'keterangan' => ['required'],
            'pengaduan'=>['required'],
            'foto' => ['nullable'],
            // 'tanggal' => ['required'],
            'id_teknisi' => ['nullable'],
            'timestart' => ['nullable'],
            'timesend' => ['nullable'],
            // 'status' => ['nullable'],
        ]);
        $pengaduan = Pengaduan::find($id);

        $data = [
            'id_pelanggan'=>$request->id_pelanggan,
            'pengaduan'=>$request->pengaduan,
            'keterangan' => $request->keterangan,
            // 'tanggal' => $request->tanggal,
            'id_teknisi' => $request->id_teknisi,
            'timestart' => $request->timestart,
            'timesend' => $request->timesend,
            // 'status' => $request->status,

        ];
        $foto = $pengaduan->foto;
        // if ($request->hasFile('foto')) {
        //     Storage::delete($foto);
        //     $foto = $request->file('foto')->store('pengaduan');
        // };
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->hashName();
            $request->file('foto')->storeAs('pengaduan', $request->file('foto')->hashName());
        }
        $pengaduan->update($data);
        return redirect('/pelanggan/pengaduan')->with('success', 'Data berhasil diupdate.');
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
        //
        Pengaduan::find($id)->delete();
        return redirect('/pelanggan/pengaduan')->with('success', 'Data berhasil dihapus.');
    }

}
