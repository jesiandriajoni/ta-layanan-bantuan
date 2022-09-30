<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $event=Event::latest()->get();
        $data=[
            'events'=>$event,
        ];
        return view('pages.event.index',$data);
    }
    public function indexpelanggan()
    {
        //
        $event=Event::latest()->get();
        $data=[
            'events'=>$event,
        ];
        return view('pages.event.indexpelanggan',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $event=Event::get();
        $data=[
            'events'=>$event,
        ];
        return view('pages.event.form',$data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'event'=>'required',
            'tanggal'=>'required',
            'alamat'=>'required',
            // 'status'=>'required',
            'deskripsi'=>'required',
        ]);
        Event::create([
            'event'=>$request->event,
            'tanggal'=>$request->tanggal,
            'alamat'=>$request->alamat,
            // 'status'=>$request->status,
            'deskripsi'=>$request->deskripsi,
        ]);
        return redirect('/admin/event')->with('success','Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $event=Event::get();
        $data=[
            'event'=>Event::find($id),
            'events'=>Event::get(),
        ];
        return view('pages.event.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $this->validate($request,[
            'event'=>['required'],
            'tanggal'=>['required'],
            'alamat'=>['required'],
            // 'status'=>['nullable'],
            'deskripsi'=>['required'],
        ]);
        $event=Event::find($id);
        $event->update([
            'event'=>$request->event,
            'tanggal'=>$request->tanggal,
            'alamat'=>$request->alamat,
            // 'status'=>$request->status,
            'deskripsi'=>$request->deskripsi,
        ]);
        return redirect('/admin/event')->with('success','Data berhasil diupdate.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Event::find($id)->delete();
        return redirect('/admin/event');
    }
}
