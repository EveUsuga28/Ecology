<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grupos extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $fillable = ['estado','grupo','id_institucion'];


    public $timestamps = false;

}
