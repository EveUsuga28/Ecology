<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class institucions extends Model
{
    use HasFactory;

    protected $primaryKey = "ID_Instituciones";

    public $timestamps = false;
}
