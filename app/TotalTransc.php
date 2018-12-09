<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TotalTransc extends Model
{
    protected $table = 'totaltransaksis';
    protected $fillable = ['id_cus','total', 'id_transc'];
}
