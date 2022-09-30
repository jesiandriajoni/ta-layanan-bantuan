<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $fillable=[
        'foto','nama_karyawan','notelp','id_divisi'
    ];

    public function divisi(){
        return $this->belongsTo(Divisi::class,'id_divisi','id');
    }
}
