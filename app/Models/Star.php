<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
    protected $table = 'star_ml';
    public $timestamps = false;

    protected $fillable = ['jenis','harga'];
}
