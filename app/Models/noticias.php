<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class noticias extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $fillable = ['titulo','introduccion','contexto','Fecha','estado','foto','id_user'];

    public $timestamps = false;

}
