<?php

namespace App\Http\Controllers;
use App\Models\reciclaje_grupo;
use App\models\institucions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class InformesController extends Controller
{

     public function all(Request $request){
        $sql=DB::table('reciclaje_grupos')
   ->Join('grupos', 'reciclaje_grupos.id_grupo', '=', 'grupos.id')
   ->Join('institucions','grupos.id_institucion', '=','institucions.id')
   ->select('reciclaje_grupos.*',
   'grupos.*','institucions.*')
   ->orderBy('total_puntaje_grupo','DESC')
   ->get();
   return response(json_encode($sql),200)->header('Content-type','text/plain');
      // $reciclaje_grupos = DB::table('reciclaje_grupos')
        //->select('reciclaje_grupos.*')

        //->get();
        //return response(json_encode($reciclaje_grupos),200)->header('Content-type','text/plain');
        //return "hola";
        //public function all(Request $request){
          //  $reciclaje_grupos = DB::table('reciclaje_grupos ')
            //->join("reciclaje_grupos","id_grupo", "=", "grupos.id")
             //->select("reciclaje_grupos.total_puntaje_grupo"
             //,"grupos.grupo")
             //->get();
             //SELECT A.total_puntaje_grupo,B.grupo
             //from reciclaje_grupos A join grupos B on(A.id_grupo = B.id)
             //return response(json_encode($reciclaje_grupos),200)->header('Content-type','text/plain');
             //return "hola";
}




    public function index(){
       return view('informes.index');
      //return "Hola";
    }



}
