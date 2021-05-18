<?php

namespace App\Http\Controllers;

use App\Models\grupos;
use App\Models\material;
use App\Models\reciclaje_grupo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class reciclajeGrupoController extends Controller
{
    public function index(){

        $reciclajeGrupo = reciclaje_grupo::join("grupos","grupos.id", "=", "reciclaje_grupos.id_grupo")
            ->select("reciclaje_grupos.*","grupos.grupo as grupo")->where('id_periodo_reciclaje',"=",session('id_reciclaje'))
            ->get();
        $grupos = grupos::join("institucions","institucions.id", "=", "grupos.id_institucion")
            ->where('id_institucion','=',session('id_institucion'))->select("grupos.*")->get();

        return view('reciclaje/reciclajeGrupo.index',compact('reciclajeGrupo','grupos'));
    }


    public function store(Request $request){

        $now = Carbon::now();
        $grupo = $request->input('grupo');

        $comprobarReciclajeExiste = reciclaje_grupo::all()->where('id_grupo','=',$grupo)
            ->where('id_periodo_reciclaje','=',session('id_reciclaje'));


       if($comprobarReciclajeExiste->isEmpty()){

               $reciclajeGrupo = reciclaje_grupo::create([
                   'id_periodo_reciclaje' => session('id_reciclaje'),
                   'id_grupo' => $grupo,
                   'total_kilos_material_grupo' => 0,
                   'total_puntaje_material_grupo' => 0,
                   'total_cantidad_productos_grupo' => 0,
                   'total_puntaje_productos_grupo' => 0,
                   'total_puntaje_grupo' => 0,
                   'fecha' => $now->format('Y-m-d'),

               ]);

           return redirect()->route('reciclajeGrupo.Crear',$reciclajeGrupo->id)->with('registradoGrupo','true');

        }else{
         return redirect()->route('reciclajeGrupo.index')->with('invalido','true');
        }

    }

    public function CrearDetalle(){

        return view('reciclaje/reciclajeGrupo.create');
    }





}
