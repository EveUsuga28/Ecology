<?php

namespace App\Http\Controllers;
use App\Models\reciclaje_institucion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\material;
use Illuminate\Support\Facades\DB;

class reciclajeIntitucionControlller extends Controller
{
    public function index(){

        $rol = auth()->user()->getRoleNames();

       if($rol[0]=='admin'){
           $reciclaje_institucion = reciclaje_institucion::all();
       }else{
           $reciclaje_institucion = reciclaje_institucion::all()
               ->where('id_institucion', '=',auth()->user()->id_institucion);
       }

        return view('reciclaje.index',compact('reciclaje_institucion'));
    }

    public function crear()
    {
        $now = Carbon::now();

        $reciclaje = reciclaje_institucion::firstOrNew([
            'fechaInicio' => $now->format('Y-m-d'),
            'id_institucion' => auth()->user()->id_institucion
        ]);

        $reciclaje->save();


         return redirect()->route('reciclajeGrupo.index');
    }

    public function editarReciclaje($id){

        return redirect()->route('reciclajeGrupo.index');
    }

    public function actualizarFechaReciclaje(){

        $now = Carbon::now();

        $reciclaje = DB::table('periodos_reciclaje')->where('fechaFin','=',null)
            ->update(['fechaFin'=>$now->format('Y-m-d')]);
    }

}
