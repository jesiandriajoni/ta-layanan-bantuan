<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Http\Requests\StorePengaduanRequest;
use App\Http\Requests\UpdatePengaduanRequest;
use App\Jobs\SendEmailJob;
use App\Mail\EmaildoneNotifikasi;
use App\Mail\EmailNotifikasi;
use App\Models\Jenispengaduan;
use App\Models\Pelanggan;
use App\Models\Teknisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('pages.pengaduan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //variabel untuk menampung data pengaduan
        $pengaduan = Pengaduan::get();
        //variabel untuk data pelanggan
        $pelanggan=Pelanggan::get();
        // $jenis_pengaduan = Jenispengaduan::get();
        $data = [
            // terdapat 2 penampungan di dalam data (pengaduan dan pelanggan)
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
        //dd($request->all());
        $request->validate([
            'id_pelanggan'=>'required',
            'keterangan' => 'required',
            'pengaduan'=>'required',
            'foto' => 'nullable',
            // 'tanggal' => 'required', --> tidak disimpan sebab mengambil tanggal hari ini
            // tanggal sudah di atur untuk menyimpan tgl hari ini
            'id_teknisi' => 'nullable',
            'timestart' => 'nullable',
            // 'timesend'=>'nullabe',
            // 'status' => 'nullable'

        ]);
        // nilai awal nama gambar di set menjadi null(kosong)
        $namagambar=null;
        // $foto = $pengaduans->foto;
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $image->storeAs('pengaduan', $image->hashName());
            // variabel namagambar -> menampung  nama gambar(pada folder public/storage/pengaduan)
            $namagambar= $image->hashName();
        }
        $pengaduan=Pengaduan::create([

            'id_pelanggan'=>$request->id_pelanggan,
            'pengaduan'=>$request->pengaduan,
            'keterangan' => $request->keterangan,
            'tanggal' => date('Y-m-d',strtotime($request->timestart)), //kosong menyipan tgl sekarang
            'id_teknisi' => $request->id_teknisi,
            'timestart' => $request->timestart,
            'status'=>'waiting',// pada saat pengaduan dibuat otomatis status menjadi waiting
            'foto'=>$namagambar,
            // 'timesend'=>$request->timesend,
            // 'status' => $request->status,
        ]);
        // $jenispengaduan=Jenispengaduan::find($request->id_jenispengaduan);
        // $id_divisi= $jenispengaduan->id_divisi;
        return redirect('/admin/pengaduan')->with('success','Data berhasil ditambahkan.');
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
    {
        //
        $pengaduans=Pengaduan::find($id);
        $pelanggan=Pelanggan::get();
        $data = [
            // 'jenis_pengaduan'=>$jenis_pengaduan,
            'pengaduans'=>$pengaduans,
            'pelanggan'=>$pelanggan,
        ];
        return view('pages.pengaduan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePengaduanRequest  $request
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            // 'id_pelanggan'=>['required'],
            'keterangan' => ['required'],
            'pengaduan'=>['required'],
            'foto' => ['nullable'],
            // 'tanggal' => ['required'],
            'id_teknisi' => ['nullable'], //karena nanti id teknisi akan terisi jika teknisi mengambil pekerjaan
            // atau pemilihan dari admin
            'timestart' => ['nullable'],
            'timesend' => ['nullable'],
            // 'status' => ['nullable'],
        ]);
        $pengaduan = Pengaduan::find($id);
        $data = [
            // 'id_pelanggan'=>$request->id_pelanggan,
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

        return redirect('/admin/pengaduan')->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengaduan::find($id)->delete();
        return redirect('/admin/pengaduan')->with('success', 'Data berhasil dihapus.');
    }
    public function accept($id){

        $pengaduan = Pengaduan::find($id);
        $teknisi = Teknisi::get();

        $data = [
            'timestart' => date('Y-m-d H:i:s'),
             'status' =>'doing',
             'teknisi'=>$teknisi,
             'pengaduans'=>$pengaduan,
        ];
        return view('pages.pengaduan.accept',$data);
    }
    public function actionaccept(Request $request,$id){
        $request->validate([
            'id_teknisi'=>'required',
        ]);
        // memanggil relasi dari tabel pengaduan ke tabel pelanggan dan teknisi
        // relasi dari tabel pengaduan ke teknisi, untuk memilih teknisi mana yang akan di pilihkan oleh admin
        $pengaduan = Pengaduan::with([
            'pelanggan',
            'teknisi',
        ])->find($id);

        $data = [
            'id_teknisi'=>$request->id_teknisi,
            'timestart' => date('Y-m-d H:i:s'),
             'status' =>'doing',// jika pengaduan di update admin, otonatis status akan berubah menjadi doing
        ];
        $pengaduan->update($data);
        // mengambil data pengaduan yang terbaru
        $pengaduan1 = Pengaduan::with([
            'pelanggan',
            'teknisi',
        ])->find($id);
        dispatch(new SendEmailJob($pengaduan1, $pengaduan1->teknisi));

        return redirect('/admin/pengaduan')->with('success', 'Teknisi Berhasil dipilih.');
    }
    public function done($id, Request $request){
        $pengaduan = Pengaduan::with([
            'pelanggan',
            'teknisi',
        ])->find($id);

        $data = [
            'timesend' => date('Y-m-d H:i:s'),
            //'timesend' => $request->timesend,
             'status' =>'done',
        ];
        Mail::to($pengaduan->pelanggan->email)->send(new EmaildoneNotifikasi($pengaduan));
        // untuk mengambil
        // Mail::to ($request->email)->send(new EmailNotifikasi);
        //     return redirect('/admin/pengaduan')->with('success',' Email Berhasil di kirim kan ke Pelanggan');
        $pengaduan->update($data);
        return redirect('/admin/pengaduan')->with('success', 'Pekerjaan Telah Diselesaikan.');
    }

    public function notifemail(Request $request,$id, $email){
        $ambil= Pelanggan::find($id);
        $data=[
            'pengaduans'=>$ambil
        ];
        Mail::to('testing@gmail.com')->send(new EmailNotifikasi($data));
        return 'email telah terkirim';
    }

    public function cetakpengaduan(Request $request)
    {
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

        return view('pages.kopsurat.index', $data);
    }

}
