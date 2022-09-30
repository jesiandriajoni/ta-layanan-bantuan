<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;
    protected $fillable=[
        'nama_divisi','jenis_divisi'
    ];
    public function divisi(){
        return $this->belongsTo(Divisi::class,'id_divisi','id');
    }
    public function divisis(){
        return $this->hasMany(Divisi::class,'id_divisi','id');

    }
    public function jenispengaduan(){
        return $this->hasMany(Jenispengaduan::class,'id_divisi','id');
    }
    // public function karyawan(){
    //     return $this->hasMany(Karyawan::class,'id_divisi','id');
    // }
}
