<?php

namespace App\Http\Controllers;

use App\Mail\EmaildoneNotifikasi;
use App\Mail\EmailNotifikasi;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PengaduanteknisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pengaduan = Pengaduan::where('status','waiting')->latest()->get();
        // orderBy('timestart', 'asc')

        $data = [
            'pengaduans' => $pengaduan,
        ];
        return view('pages.pengaduan.indexteknisi', $data);
    }

    //function menampilkan data-data pelapor di halaman teknisi
    public function indexpelapor()
    {
        $pengaduan = Pengaduan::where('status','!=', 'waiting')->where('id_teknisi',Auth::guard('teknisi')->user()->id)->orderBy('timestart', 'asc')->get();
        $data = [
            'pengaduans' => $pengaduan,
        ];
        return view('pages.pengaduan.pelaporan', $data);
    }

    public function accept($id){
        $pengaduan = Pengaduan::where('id',$id)->orderBy('timestart','asc');
        $data = [
            'timestart' => date('Y-m-d H:i:s'),
            // 'timesend' => $request->timesend,
             'status' =>'doing',
             'id_teknisi'=>Auth('teknisi')->user()->id,
        ];
        // dd($data);
        $pengaduan->update($data);
        // buat ngambil data terbaru setelah di update
        $datapengaduan = Pengaduan::with([
            'pelanggan',
            'teknisi',
        ])->find($id);
        // dd($datapengaduan);
        Mail::to($datapengaduan->pelanggan->email)->send(new EmailNotifikasi($datapengaduan));
        return redirect('/teknisi/pengaduan')->with('success', 'Masalah berhasil dipilih.');
    }
    public function done($id){

        $pengaduan = Pengaduan::with([
            'pelanggan',
            'teknisi',
        ])->latest()->find($id);

        $data = [
            'timesend' => date('Y-m-d H:i:s'),
            // 'timesend' => $request->timesend,
             'status' =>'done',
        ];

        $pengaduan->update($data);
        Mail::to($pengaduan->pelanggan->email)->send(new EmaildoneNotifikasi($pengaduan));
        return redirect('/teknisi/selesai')->with('success', 'Pekerjaan Telah Diselesaikan.');
    }
    public function doing(){
        $pengaduan = Pengaduan::where('id_teknisi',Auth::guard('teknisi')->user()->id)->where('status','doing')->latest()->get();
        $data = [
            'pengaduans' => $pengaduan,
        ];
        return view('pages.pengaduan.indexteknisi', $data);
    }
    public function selesai(){
        $pengaduan = Pengaduan::where('id_teknisi',Auth::guard('teknisi')->user()->id)->where('status','done')->latest()->get();
        $data = [
            'pengaduans' => $pengaduan,
        ];
        return view('pages.pengaduan.indexteknisi', $data);
    }

}
