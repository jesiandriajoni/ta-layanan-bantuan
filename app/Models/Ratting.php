<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratting extends Model
{
    use HasFactory;
    protected $fillable=[
        'nilai','id_teknisi','nilai','id_pengaduan','deskripsi'
    ];
    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class,'id_pelanggan','id');
    }
    public function teknisi(){
        return $this->belongsTo(Teknisi::class,'id_teknisi','id');
    }
    public function pengaduan(){
        return $this->belongsTo(Pengaduan::class,'id_pengaduan','id');
    }

}
