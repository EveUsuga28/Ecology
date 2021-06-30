<?php

namespace App\Http\Controllers;
use App\Models\reciclaje_grupo;
use App\models\institucions;
use Illuminate\Http\Request;
use app\Models\reciclaje_institucion;
use Illuminate\Support\Facades\DB;
use DataTables;
use PDF;
class InformesController extends Controller
{

     public function all(Request $request){

        $reciclaje = reciclaje_grupo::selectRaw('institucions.nombre,sum(reciclaje_grupos.total_puntaje_grupo) as totalPuntaje ')
              ->join("grupos","grupos.id", "=", "reciclaje_grupos.id_grupo")
              ->join("institucions","institucions.id", "=", "grupos.id_institucion")
              ->orderBy('totalPuntaje','DESC')
              ->groupBy('institucions.nombre')
              ->get();
    return response(json_encode($reciclaje),200)->header('Content-type','text/plain');
}



    public function index(){
       return view('informes.index');
      //return "Hola";
    }
    public function imprimir()
    {


        $reciclaje = reciclaje_grupo::selectRaw('institucions.nombre,sum(reciclaje_grupos.total_puntaje_grupo) as totalPuntaje ')
        ->join("grupos","grupos.id", "=", "reciclaje_grupos.id_grupo")
        ->join("institucions","institucions.id", "=", "grupos.id_institucion")
        ->orderBy('totalPuntaje','DESC')
        ->groupBy('institucions.nombre')
        ->get();

        $data = compact('reciclaje');


        $pdf = PDF::loadView('pdf.reporteInformes', $data);
        return $pdf->download('informes.pdf');
    }


}
