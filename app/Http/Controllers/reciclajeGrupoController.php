<?php

namespace App\Http\Controllers;

use App\Models\grupos;
use App\Models\material;
use App\Models\reciclaje_grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class reciclajeGrupoController extends Controller
{
    public function index(){

        $reciclajeGrupo = reciclaje_grupo::join("grupos","grupos.id", "=", "reciclaje_grupos.id_grupo")
            ->select("reciclaje_grupos.*","grupos.grupo as grupo")->where('id_periodo_reciclaje',"=",session('id_reciclaje'))
            ->get();

        return view('reciclaje/reciclajeGrupo.index',compact('reciclajeGrupo'));
    }

    public function create(){

        $materiales =material::all();
        $grupos = grupos::join("institucions","institucions.id", "=", "grupos.id_institucion")
            ->select("grupos.*")->get();

        return view('reciclaje/reciclajeGrupo.create',compact('materiales','grupos'));
    }

}
