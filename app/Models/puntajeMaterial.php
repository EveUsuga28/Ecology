<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class puntajeMaterial extends Model
{

    use HasFactory;

    protected $table = 'puntajeMaterials';
    protected $primaryKey = "idPuntajeMaterail";
    protected $fillable = [
    'idPuntajeMaterail',
    'id_materials',
    'Fecha_Inicio',
    'Fecha_Fin',
    'Puntaje'];

}
