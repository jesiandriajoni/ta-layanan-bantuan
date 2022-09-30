<?php

namespace App\Http\Controllers;

use App\Models\Databandwidth;
use App\Models\Pelanggan;
use App\Models\Pengaduan;
use App\Models\Teknisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardadminController extends Controller
{
    //
    public function index(){
        // $pengaduan = DB::table('pengaduans')
        // ->selectRaw('DISTINCT(pengaduans.id_jenispengaduan),
        // jenispengaduans.nama_pengaduan,
        // count(pengaduans.id_jenispengaduan) as jumlah ')
        // //MEMBUAT RELASI
        // ->join('jenispengaduans','pengaduans.id_jenispengaduan','=','jenispengaduans.id')
        // ->groupBy('pengaduans.id_jenispengaduan')->get();

        $pengaduanpertahun = DB::table('pengaduans')
        ->selectRaw("COUNT(*) as jumlah, (DATE_FORMAT(tanggal, '%M - %Y')) as month_year")
        ->groupBy(DB::raw("DATE_FORMAT(tanggal, '%m-%Y')"))->get();
        //++++jika ingin menampilkan grafik pengaduan berdasarkan mulai gangguan
        // ->selectRaw("COUNT(*) as jumlah, (DATE_FORMAT(timestart, '%M - %Y')) as month_year")
        // ->groupBy(DB::raw("DATE_FORMAT(timestart, '%m-%Y')"))->get();

        // menghitung jumlah data pada halaman di atas dashboard
        $jumlah_pengaduan = Pengaduan::count();
        $jumlah_teknisi = Teknisi::count();
        $jumlah_pelanggan = Pelanggan::count();
        $jumlah_bandwith = Databandwidth::get()->sum('jumlah');

        $data = [
            // // untuk mengambil label yang ada di tabel pengaduan
            // 'label_pengaduan'=> json_encode($pengaduan->pluck('nama_pengaduan')),
            // //menampilkan data grafik pengaduan pertahun
            // 'jumlah_pengaduanchart'=>json_encode($pengaduan->pluck('jumlah')),
            'label_pengaduanpertahun'=> json_encode($pengaduanpertahun->pluck('month_year')),
            'jumlah_pengaduanpertahun'=>json_encode($pengaduanpertahun->pluck('jumlah')),

            // pemanggilan
            'jumlah_pengaduan'=>$jumlah_pengaduan,
            'jumlah_teknisi'=>$jumlah_teknisi,
            'jumlah_pelanggan'=>$jumlah_pelanggan,
            'jumlah_bandwith'=>$jumlah_bandwith,
        ];
        // dd($data);
        return view('pages.dashboard.index',$data);



    }

}
