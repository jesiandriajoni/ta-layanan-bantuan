<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Teknisi extends Authenticatable
{
    use HasFactory;
    protected $fillable=[
        'foto','nama_teknisi','notelp','username','password','email'
        // 'id_divisi',
    ];

    public function divisi(){
        return $this->belongsTo(Divisi::class,'id_divisi','id');
    }
    public function username()
    {
        return $this->username;
    }
}
