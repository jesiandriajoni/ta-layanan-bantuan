<?php

namespace App\Http\Controllers;

use App\Models\Databandwidth;
use App\Models\Pelanggan;
use App\Models\Pengaduan;
use App\Models\Teknisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardteknisiController extends Controller
{
    //
    public function index(){


        $pengaduanpertahun = DB::table('pengaduans')
        ->selectRaw("COUNT(*) as jumlah, (DATE_FORMAT(tanggal, '%M - %Y')) as month_year")
        ->groupBy(DB::raw("DATE_FORMAT(tanggal, '%m-%Y')"))->get();
        $jumlah_pengaduan = Pengaduan::count();
        $jumlah_teknisi = Teknisi::count();
        $jumlah_pelanggan = Pelanggan::count();
        $jumlah_bandwith = Databandwidth::get()->sum('jumlah');


        $data = [


            'label_pengaduanpertahun'=> json_encode($pengaduanpertahun->pluck('month_year')),
            'jumlah_pengaduanpertahun'=>json_encode($pengaduanpertahun->pluck('jumlah')),
            'jumlah_pengaduan'=>$jumlah_pengaduan,
            'jumlah_teknisi'=>$jumlah_teknisi,
            'jumlah_pelanggan'=>$jumlah_pelanggan,
            'jumlah_bandwith'=>$jumlah_bandwith,
        ];
        // dd($data);

        return view('pages.dashboard.indexteknisi',$data);
    }
}
