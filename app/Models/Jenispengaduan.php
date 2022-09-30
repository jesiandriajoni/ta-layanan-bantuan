<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenispengaduan extends Model
{
    use HasFactory;
    protected $fillable=[
        'id_jenispengaduan','id_divisi','nama_pengaduan','jenis_pengaduan'
    ];
    public function jenispengaduan(){
        return $this->belongsTo(Jenispengaduan::class,'id_jenispengaduan','id');
    }
    public function divisi(){
        return $this->belongsTo(Divisi::class,'id_divisi','id');
    }



}
