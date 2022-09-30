<?php

namespace App\Http\Controllers;

use App\Models\Databandwidth;
use App\Http\Requests\StoreDatabandwidthRequest;
use App\Http\Requests\UpdateDatabandwidthRequest;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class DatabandwidthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $databandwidth = Databandwidth :: latest()->get();
        $data=[
            'databandwidth' => $databandwidth,
        ];
        return view('pages.databandwidth.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pelanggan = Pelanggan::get();
        $databandwidth = Databandwidth::get();
        $data = [
            'pelanggans'=>$pelanggan,
            'databandwidth'=>$databandwidth,
        ];
        return view('pages.databandwidth.form',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDatabandwidthRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'id_data' =>'required',
            'jumlah'=>'required',
        ]);
        Databandwidth::create([
            'id_data'=>$request->id_data,
            'jumlah'=>$request->jumlah,
        ]);
        return redirect('/admin/databandwidth')->with('success','Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Databandwidth  $databandwidth
     * @return \Illuminate\Http\Response
     */
    public function show(Databandwidth $databandwidth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Databandwidth  $databandwidth
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $pelanggan = Pelanggan::get();
        $databandwidth = Databandwidth::find($id);
        $data = [
            'pelanggans'=>$pelanggan,
            'databandwidth'=>$databandwidth,
        ];
        return view('pages.databandwidth.edit',$data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDatabandwidthRequest  $request
     * @param  \App\Models\Databandwidth  $databandwidth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $this->validate($request, [
            'id_data'=>['required'],
            'jumlah' => ['required'],

        ]);
        $databandwidth = Databandwidth::find($id);
        $databandwidth->update([
            'id_data'=>$request->id_data,
            'jumlah'=>$request->jumlah,
        ]);

        return redirect('admin/databandwidth')-> with('success','Data berhasil diupdate.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Databandwidth  $databandwidth
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        Databandwidth::find($id)->delete();
        return redirect('/admin/databandwidth')->with('success','Data berhasil dihapus.');
    }
}
