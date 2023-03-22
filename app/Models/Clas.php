<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clas extends Model
{
    protected $table = 'clas_ml';
    public $timestamps = false;

    protected $fillable = ['jenis','harga'];
}
