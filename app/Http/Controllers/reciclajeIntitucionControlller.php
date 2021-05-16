<?php

namespace App\Http\Controllers;
use App\Models\reciclaje_institucion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\material;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class reciclajeIntitucionControlller extends Controller
{
    public function index(){

        $rol = auth()->user()->getRoleNames();

       if($rol[0]=='admin'){
           $reciclaje_institucion = reciclaje_institucion::all();

           $camposcalculados = $this->calcularReciclajeInstitucion($reciclaje_institucion);
       }else{
           $reciclaje_institucion = reciclaje_institucion::all()
               ->where('id_institucion', '=',auth()->user()->id_institucion);

           $camposcalculados = $this->calcularReciclajeInstitucion($reciclaje_institucion);
       }


       return view('reciclaje.index',compact('reciclaje_institucion','camposcalculados'));
    }

    public function crear()
    {
        $now = Carbon::now();

        $reciclaje = reciclaje_institucion::firstOrNew([
            'fechaInicio' => $now->format('Y-m-d'),
            'id_institucion' => auth()->user()->id_institucion
        ]);

        $reciclaje->save();

        session(['id_reciclaje' => $reciclaje->id]);

         return redirect()->route('reciclajeGrupo.index');
    }

    public function editarReciclaje($id){

        session(['id_reciclaje' => $id]);

        return redirect()->route('reciclajeGrupo.index');
    }

    public function actualizarFechaReciclaje(){

        $now = Carbon::now();

        $reciclaje = DB::table('periodos_reciclaje')->where('fechaFin','=',null)
            ->update(['fechaFin'=>$now->format('Y-m-d')]);
    }

    public function calcularReciclajeInstitucion($reciclajeInstitucion){

        $aux='';
        $result = array();
        $i = 0;
        foreach ($reciclajeInstitucion as $reciclaje){
            $aux=DB::Table('reciclaje_grupos')->select(DB::raw('sum(total_kilos_material_grupo) as MaterialTotal
            ,sum(total_puntaje_material_grupo) as PuntajeMaterial'))
                ->where('id_periodo_reciclaje','=',$reciclaje->id)->get();

            $result[$i]=$aux;
            $i++;
        }

        return $result;
    }

}
