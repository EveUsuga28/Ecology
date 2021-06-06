<?php

namespace App\Http\Controllers;
use App\Models\reciclaje_grupo;
use App\Models\reciclaje_institucion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\material;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class reciclajeIntitucionControlller extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $rol = auth()->user()->getRoleNames();

       if($rol[0]=='admin'){
           $reciclaje_institucion = reciclaje_institucion::join("institucions","institucions.id", "=", "periodos_reciclaje.id_institucion")
               ->select("institucions.nombre","periodos_reciclaje.*",
                   DB::raw("(select ifnull(sum(total_kilos_material_grupo),0) from reciclaje_grupos where id_periodo_reciclaje="."periodos_reciclaje.id"
                   ." and estado=1)"."as kilos"),
                   DB::raw("(select ifnull(sum(total_puntaje_material_grupo),0) from reciclaje_grupos where id_periodo_reciclaje="."periodos_reciclaje.id"
                       ." and estado=1)"."as totalPuntajeMaterial"),
                   DB::raw("(select ifnull(sum(total_cantidad_productos_grupo),0) from reciclaje_grupos where id_periodo_reciclaje="."periodos_reciclaje.id"
                       ." and estado=1)"."as cantidad"),
                   DB::raw("(select ifnull(sum(total_puntaje_productos_grupo),0) from reciclaje_grupos where id_periodo_reciclaje="."periodos_reciclaje.id"
                       ." and estado=1)"."as totalPuntajeProductos"),
                   DB::raw("(select ifnull(sum(total_puntaje_productos_grupo),0) from reciclaje_grupos where id_periodo_reciclaje="."periodos_reciclaje.id"
                       ." and estado=1)"."as totalPuntajeProductos"),
                   DB::raw("(select ifnull(sum(total_puntaje_grupo),0) from reciclaje_grupos where id_periodo_reciclaje="."periodos_reciclaje.id"
                       ." and estado=1)"."as totalPuntaje")
                    )->get();
       }else{
           $reciclaje_institucion = DB::table('periodos_reciclaje')
               ->where('id_institucion', '=',auth()->user()->id_institucion)
               ->select("periodos_reciclaje.*",
                   DB::raw("(select ifnull(sum(total_kilos_material_grupo),0) from reciclaje_grupos where id_periodo_reciclaje="."periodos_reciclaje.id"
                       ." and estado=1)"."as kilos"),
                   DB::raw("(select ifnull(sum(total_puntaje_material_grupo),0) from reciclaje_grupos where id_periodo_reciclaje="."periodos_reciclaje.id"
                       ." and estado=1)"."as totalPuntajeMaterial"),
                   DB::raw("(select ifnull(sum(total_cantidad_productos_grupo),0) from reciclaje_grupos where id_periodo_reciclaje="."periodos_reciclaje.id"
                       ." and estado=1)"."as cantidad"),
                   DB::raw("(select ifnull(sum(total_puntaje_productos_grupo),0) from reciclaje_grupos where id_periodo_reciclaje="."periodos_reciclaje.id"
                       ." and estado=1)"."as totalPuntajeProductos"),
                   DB::raw("(select ifnull(sum(total_puntaje_productos_grupo),0) from reciclaje_grupos where id_periodo_reciclaje="."periodos_reciclaje.id"
                       ." and estado=1)"."as totalPuntajeProductos"),
                   DB::raw("(select ifnull(sum(total_puntaje_grupo),0) from reciclaje_grupos where id_periodo_reciclaje="."periodos_reciclaje.id"
                       ." and estado=1)"."as totalPuntaje")
               )->get();;
       }


       return view('reciclaje.index',compact('reciclaje_institucion'));
    }

    public function crear(Request $request)
    {
        $now = Carbon::now();

        $rol = auth()->user()->getRoleNames();

            if($rol[0]=='admin'){

                return redirect()->route('reciclaje.index')->with('institucion','true');
            }else{
                $reciclaje = reciclaje_institucion::create([
                    'fechaInicio' => $now->format('Y-m-d'),
                    'id_institucion' => auth()->user()->id_institucion
                ]);

            }

            session(['id_reciclaje' => $reciclaje->id]);
            session(['id_institucion'=> $reciclaje->id_institucion]);
            session(['estado'=> $reciclaje->estado]);

            return redirect()->route('reciclajeGrupo.index')->with('creado','true');

    }

    public function editarReciclaje($id){

        $reciclaje = reciclaje_institucion::find($id);

        session(['id_reciclaje' => $reciclaje->id]);
        session(['id_institucion'=> $reciclaje->id_institucion]);
        session(['estado'=> $reciclaje->estado]);

        return redirect()->route('reciclajeGrupo.index');
    }


    public function detalle_reciclaje($id){

        $reciclaje = reciclaje_institucion::find($id);

        session(['id_reciclaje' => $reciclaje->id]);
        session(['id_institucion'=> $reciclaje->id_institucion]);
        session(['estado'=> $reciclaje->estado]);

        return redirect()->route('reciclajeGrupo.index');
    }


    public function EnviarReciclajeInstitucion($id){

        $ReciclajeEstado = reciclaje_institucion::find($id);

        $ReciclajeEstado->estado = 'ENVIADO';

        $ReciclajeEstado->save();

        return back()->with('Enviado','true');
    }

    public function confirmarRechazarReciclaje(Request $request){

        $ReciclajeEstado = reciclaje_institucion::find($request->id);

       if($request->estado == 'Confirmar'){
            $ReciclajeEstado->estado='CONFIRMADO';
            $ReciclajeEstado->save();
            $this->FinalizarReciclaje($ReciclajeEstado->id);
            return back()->with('confirmado','true');
        }else{
            $ReciclajeEstado->estado='RECHAZADO';
            $ReciclajeEstado->save();
            return back()->with('rechazado','true');
        }
    }

    public function FinalizarReciclaje($id){

        $now = Carbon::now();

            DB::table('periodos_reciclaje')->where('id','=',$id)
            ->update(['fechaFin'=>$now->format('Y-m-d')]);
    }


}
