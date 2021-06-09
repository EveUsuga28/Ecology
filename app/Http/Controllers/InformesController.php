<?php

namespace App\Http\Controllers;
use App\Models\reciclaje_grupo;
use App\models\institucions;
use Illuminate\Http\Request;
use app\Models\reciclaje_institucion;
use Illuminate\Support\Facades\DB;
use DataTables;

class InformesController extends Controller
{

     public function all(Request $request){

        $reciclaje = reciclaje_grupo::selectRaw('institucions.nombre,sum(reciclaje_grupos.total_puntaje_grupo) as totalPuntaje ')
              ->join("grupos","grupos.id", "=", "reciclaje_grupos.id_grupo")
              ->join("institucions","institucions.id", "=", "grupos.id_institucion")
              ->orderBy('totalPuntaje','DESC')
              ->groupBy('institucions.nombre')
              ->get();
      //  $sql=DB::table('periodos_reciclaje')
       //->join("institucions","institucions.id", "=", "periodos_reciclaje.id_institucion")
        //->select("institucions.nombre",
        //DB::raw("(select ifnull(sum(total_puntaje_grupo),0) from reciclaje_grupos where id_periodo_reciclaje="."periodos_reciclaje.id"
                      //." and estado=1 )"."as totalPuntaje" ))

        //->get();
                   // return $reciclaje_institucion;
    return response(json_encode($reciclaje),200)->header('Content-type','text/plain');
}



    public function index(){
       return view('informes.index');
      //return "Hola";
    }


//Mi consulta

//$sql=DB::table('reciclaje_grupos')
//->Join('grupos', 'reciclaje_grupos.id_grupo', '=', 'grupos.id')
//->Join('institucions','grupos.id_institucion', '=','institucions.id')
//->select('reciclaje_grupos.*',
//'grupos.*','institucions.*')
// DB::raw('SUM(total_puntaje_grupo')
//->where("id" ,"=", "id_institucion")
//->orderBy('total_puntaje_grupo','DESC')
 //->groupBy('id_institucion')
//->get();
//return response(json_encode($sql),200)->header('Content-type','text/plain');
}
