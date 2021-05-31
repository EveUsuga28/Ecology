<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class institucions extends Model
{
    use HasFactory;

    protected $primaryKey = "id";

    protected $fillable = ['nombre','telefono','fechaRegistro','foto','direccion'];


    public $timestamps = false;
}
