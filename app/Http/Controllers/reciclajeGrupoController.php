<?php

namespace App\Http\Controllers;

use App\Models\detalle_grupos_materiales;
use App\Models\grupos;
use App\Models\material;
use App\Models\reciclaje_grupo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class reciclajeGrupoController extends Controller
{
    public function index(){

        $reciclajeGrupo = reciclaje_grupo::join("grupos","grupos.id", "=", "reciclaje_grupos.id")
            ->select("reciclaje_grupos.*","grupos.grupo as grupo")->where('id_periodo_reciclaje',"=",session('id_reciclaje'))
            ->get();
        $grupos = grupos::join("institucions","institucions.id", "=", "grupos.id_institucion")
            ->where('id_institucion','=',session('id_institucion'))->select("grupos.*")->get();

        return view('reciclaje/reciclajeGrupo.index',compact('reciclajeGrupo','grupos'));
    }


    public function store(Request $request){

        $now = Carbon::now();
        $grupo = $request->input('grupo');

        $comprobarReciclajeExiste = reciclaje_grupo::all()->where('id','=',$grupo)
            ->where('id_periodo_reciclaje','=',session('id_reciclaje'));


       if($comprobarReciclajeExiste->isEmpty()){

               $reciclajeGrupo = reciclaje_grupo::create([
                   'id_periodo_reciclaje' => session('id_reciclaje'),
                   'id' => $grupo,
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

    public function EditarDetalle($id, Request $request){

        $materiales = material::all();

        return view('reciclaje/reciclajeGrupo.create',compact('materiales','id'));
    }

    public function CrearDetalle($id){

        $materiales = material::all();

        return view('reciclaje/reciclajeGrupo.create',compact('materiales','id'));
    }


    public function indexMaterialesDetalle($id,Request $request){


        if($request->ajax()){
            $materiales =  DB::table('detalle_reciclaje_grupos_materiales')->where('id_reciclaje_grupo','=',$id)
                ->join("materials","materials.id", "=", "detalle_reciclaje_grupos_materiales.id_materiales")
                ->select("detalle_reciclaje_grupos_materiales.kilos as kilos"
                    ,"detalle_reciclaje_grupos_materiales.puntaje as puntaje"
                    ,"materials.NomreMaterial as nombre"
                    ,"detalle_reciclaje_grupos_materiales.id as id"
                    ,"detalle_reciclaje_grupos_materiales.estado as estado")
                ->get();
            return DataTables::of($materiales)
                ->addColumn('action', function($materiales){
                    $acciones = '<a href="" class=""><i class="fas fa-edit"></i></a>';
                    if($materiales->estado == 1) {
                        $acciones .= '&nbsp;&nbsp;<button type="button" onclick="AlertaDeshabilitar('.$materiales->id.')" name="delete" id="'.$materiales->id.'"  class="btn btn-danger">Deshabilitar</button>';
                    }else{
                        $acciones .= '&nbsp;&nbsp;<button onclick="AlertaHabilitar('.$materiales->id.')" id="'.$materiales->id.'"  class="btn btn-secondary">habilitar</button>';
                    }
                    return $acciones;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

    }

    public function crearDetalleMateriales(Request $request)
    {

       if(DB::table('detalle_reciclaje_grupos_materiales')->where('id_reciclaje_grupo',$request->idGrupo)
        ->where('id_materiales',$request->material)->exists()){
            return 1;
        }else{
            DB::table('detalle_reciclaje_grupos_materiales')->insert([
                'id_reciclaje_grupo' => $request->idGrupo,
                'id_materiales' => $request->material,
                'kilos' =>  $request->kilos,
                'puntaje' => $this->calcularPuntajeMaterial($request->material, $request->kilos)
            ]);
           $this->calcularDetalleGrupoMaterial($request->idGrupo);

           return 2;
        }

    }

    public function calcularPuntajeMaterial($id,$kilos){

        $material = material::find($id);

        $resultado = floor($kilos/$material->Kilos)*$material->Puntaje;

        return $resultado;
    }


    public function calcularDetalleGrupoMaterial($id){

            DB::table("reciclaje_grupos")
                ->where("id", "=", $id)
                ->update([
                    "total_kilos_material_grupo"     => DB::raw("(select ifnull(sum(kilos),0) from detalle_reciclaje_grupos_materiales where id_reciclaje_grupo=".$id." and estado=1)"),
                    "total_puntaje_material_grupo" => DB::raw("(select ifnull(sum(puntaje),0) from detalle_reciclaje_grupos_materiales where id_reciclaje_grupo=".$id." and estado=1)"),
                ]);

            $this->PuntajeTotalDetalle($id);
    }

    public function PuntajeTotalDetalle($id){
        DB::table("reciclaje_grupos")
            ->where("id", "=", $id)
            ->update([
                "total_puntaje_grupo" => DB::raw("(select ifnull(total_puntaje_material_grupo,0)+ifnull(total_puntaje_productos_grupo,0) from reciclaje_grupos where id=".$id.")")
            ]);
    }

    public function deshabilitar_habilitar($id){

        $detalleReciclajeGrupo = detalle_grupos_materiales::find($id);

       if($detalleReciclajeGrupo->estado == 1){
           $detalleReciclajeGrupo->estado = 0;
       }else{
           $detalleReciclajeGrupo->estado = 1;
       }

       $detalleReciclajeGrupo->save();

       $this->calcularDetalleGrupoMaterial($detalleReciclajeGrupo->id_reciclaje_grupo);

       return back();
    }


   public function editarMaterialDetalle(Request $request){

   }

}
