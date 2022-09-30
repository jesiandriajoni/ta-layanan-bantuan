<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Databandwidth extends Model
{
    use HasFactory;
    protected $fillable=[
        'id_data',
        'jumlah',
    ];
    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class,'id_data','id');
    }
}
