<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ML_JokiPaket extends Model
{
    protected $table = 'ml_joki_paket';
    public $timestamps = false;

    protected $fillable = ['name','email','password' ,'login','id_paket','no_wa','total','payment'];
}
