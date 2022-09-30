<?php

namespace App\Http\Controllers;

use App\Models\Ratting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RattingteknisiadminController extends Controller
{
    //
    public function index(){
        $ratting = DB::table('rattings')
        ->selectRaw("DISTINCT(rattings.id_teknisi), teknisis.nama_teknisi, avg(nilai) as nilai_ratting")
        ->join('teknisis','rattings.id_teknisi', '=' ,'teknisis.id')
        ->groupBy('rattings.id_teknisi')->get();

        $data =[
            'label_ratting'=>json_encode($ratting->pluck('nama_teknisi')),
            'jumlah_ratting'=>json_encode($ratting->pluck('nilai_ratting')),
            // 'rattings'=>$total_ratting,
        ];
        // dd($data);
        return view('pages.ratting.grafikteknisi',$data);

    }
    public function indexsupervisor(){
        $ratting = DB::table('rattings')
        ->selectRaw("DISTINCT(rattings.id_teknisi), teknisis.nama_teknisi, avg(nilai) as nilai_ratting")
        ->join('teknisis','rattings.id_teknisi', '=' ,'teknisis.id')
        ->groupBy('rattings.id_teknisi')->get();
        $data =[
            'label_ratting'=>json_encode($ratting->pluck('nama_teknisi')),
            'jumlah_ratting'=>json_encode($ratting->pluck('nilai_ratting')),
            // 'rattings'=>$total_ratting,
        ];
        // dd($data);
        return view('pages.ratting.grafikteknisi',$data);

    }
}
