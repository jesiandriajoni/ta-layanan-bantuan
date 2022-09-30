<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $fillable=[
        'tanggal','pengaduan','pengaduan','id_pelanggan','keterangan','foto', 'id_teknisi','timestart','timesend','status','kode_pelanggan',
        // ,'id_jenispengaduan'
    ];
    // public function jenispengaduan(){
    //     return $this->belongsTo(Jenispengaduan::class,'id_jenispengaduan','id');
    // }

    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class,'id_pelanggan','id');
    }
    public function teknisi(){
        //pemanggilan data dari anak ke induk
        return $this->belongsTo(Teknisi::class,'id_teknisi','id');
    }
    public function ratting(){
        //pemangilan data dari induk ke anak
        return $this->hasOne(Ratting::class,'id_pengaduan','id');
    }


}
