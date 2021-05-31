<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class puntajeProducto extends Model
{
    use HasFactory;

    protected $table = 'puntaje_products';
    protected $primaryKey = "id";

    public $timestamps = false;
}
