<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reciclaje_grupo extends Model
{
    use HasFactory;


    protected $table = 'reciclaje_grupos';


    protected $fillable = [
        'id_periodo_reciclaje',
        'id_grupo',
        'total_kilos_material_grupo',
        'total_puntaje_material_grupo',
        'total_cantidad_productos_grupo',
        'total_puntaje_productos_grupo',
        'total_puntaje_grupo',
        'fecha'
    ];

    public $timestamps = false;


}
