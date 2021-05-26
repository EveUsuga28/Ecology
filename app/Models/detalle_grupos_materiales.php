<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_grupos_materiales extends Model
{
    use HasFactory;

    protected $table = 'detalle_reciclaje_grupos_productos';

    protected $fillable = ['id_reciclaje_grupo','id_materiales','kilos','puntaje'];

    public $timestamps = false;

}
