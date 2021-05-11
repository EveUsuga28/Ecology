<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reciclaje_institucion extends Model
{
    use HasFactory;

    protected $table = 'periodos_reciclaje';


    protected $fillable = ['fechaInicio','fechaFin','estado','id_institucion'];

    public $timestamps = false;

    public function institucion(){
        return $this->belongsTo('app/Models/institucions');
    }
}
