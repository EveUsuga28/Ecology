<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class reciclajeGrupoController extends Controller
{
    public function index(){


        return view('reciclaje/reciclajeGrupo.index');
    }
}
