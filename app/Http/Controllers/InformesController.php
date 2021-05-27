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
       $reciclaje_grupos = DB::table('institucions')
        ->select('institucions.*')
        ->orderBy('id','DESC')
        ->get();
        return response(json_encode($reciclaje_grupos),200)->header('Content-type','text/plain');
        //return "hola";
}


    public function index(){
       return view('informes.index');
      //return "Hola";
    }



}
