<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class material extends Model
{
    use HasFactory;

    protected $fillable = ['NomreMaterial','Kilos','Puntaje','Foto'];


    public $timestamps = false;

}
