<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ML_JokiClas extends Model
{
    protected $table = 'ml_joki_clas';
    public $timestamps = false;

    protected $fillable = ['name','email','password' ,'login','id_clas','no_wa','qty','total','payment'];
}
