<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ML_JokiStar extends Model
{
    protected $table = 'ml_joki_star';
    public $timestamps = false;

    protected $fillable = ['name','email','password' ,'login','id_star','no_wa','qty','total','payment'];
}
