<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kurir extends Model
{
    protected  $table = 'kurirs';
    protected $fillable = ['namakurir','jeniskurit','alamat','gambar'];    
}
