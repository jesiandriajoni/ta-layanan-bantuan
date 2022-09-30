<?php

namespace App\Http\Controllers;

use App\Models\Databandwidth;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DatabandwidthpelangganController extends Controller
{
    //
    public function index()
    {
        //

        $databandwidth = Databandwidth::where('id_data',Auth::guard('pelanggan' )->user()->id)->get();

        $data=[
            'databandwidth' => $databandwidth,
        ];
        return view('pages.databandwidth.indexpelanggan',$data);
    }
}
