<?php

namespace App\Http\Controllers;

use App\Models\detalle_grupos_materiales;
use App\Models\detalle_grupos_productos;
use App\Models\grupos;
use App\Models\material;
use App\Models\Producto;
use App\Models\reciclaje_grupo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class reciclajeGrupoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    public function index(){

        $reciclajeGrupo = reciclaje_grupo::join("grupos","grupos.id", "=", "reciclaje_grupos.id_grupo")
            ->select("reciclaje_grupos.*","grupos.grupo as grupo")->where('id_periodo_reciclaje',"=",session('id_reciclaje'))
            ->get();
        $grupos = grupos::join("institucions","institucions.id", "=", "grupos.id_institucion")
            ->where('id_institucion','=',session('id_institucion'))
            //->where('estado','<>','0') Pendiente de definir
            ->select("grupos.*")->get();

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
                   'fecha' => $now->format('Y-m-d'),

               ]);

           return redirect()->route('reciclajeGrupo.Crear',$reciclajeGrupo->id)->with('registradoGrupo','true');

        }else{
         return redirect()->route('reciclajeGrupo.index')->with('invalido','true');
        }

    }

    public function EditarDetalle($id){

        $materiales = material::all();
        $productos = Producto::all();

        return view('reciclaje/reciclajeGrupo.create',compact('materiales','id','productos'));
    }

    public function CrearDetalle($id){

        $materiales = material::all();
        $productos = Producto::all()->where('estado','=','habilitado');

        return view('reciclaje/reciclajeGrupo.create',compact('materiales','id','productos'));
    }

    public function PuntajeTotalDetalle($id){
        DB::table("reciclaje_grupos")
            ->where("id", "=", $id)
            ->update([
                "total_puntaje_grupo" => DB::raw("(select ifnull(total_puntaje_material_grupo,0)+ifnull(total_puntaje_productos_grupo,0) from reciclaje_grupos where id=".$id.")")
            ]);
    }


    //-------------------------------------------------------------------- MATERIALES -------------------------------------------------------------------------------------//


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
                        $acciones ='';
                    if($materiales->estado == 1) {
                        $acciones = '<a href="javascript:void(0)" onclick="editarDetalleMaterial(' . $materiales->id . ')" class=""><i class="fas fa-edit"></i></a>';
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


   public function enviarEditarDetalleMaterial($id){

       $detalleReciclajeGrupo = DB::table('detalle_reciclaje_grupos_materiales')->where('id','=',$id)->get();

       return response()->json($detalleReciclajeGrupo);
   }

    public function ActualizarDetalleMaterial(Request $request){

          DB::table('detalle_reciclaje_grupos_materiales')
            ->where('id', '=',$request->id)
              ->update(['kilos' => $request->kilos,'puntaje' => $this->calcularPuntajeMaterial($request->id_material,$request->kilos)]);

          $this->calcularDetalleGrupoMaterial($request->id_grupo);

        return  back();
    }



    //-------------------------------------------------------------------- PRODUCTOS -------------------------------------------------------------------------------------//


    public function indexProductoDetalle($id,Request $request){

        if($request->ajax()){
            $productos =  DB::table('detalle_reciclaje_grupos_productos')->where('id_reciclaje_grupo','=',$id)
                ->join("products","products.id", "=", "detalle_reciclaje_grupos_productos.id_producto")
                ->select("detalle_reciclaje_grupos_productos.cantidad as cantidad"
                    ,"detalle_reciclaje_grupos_productos.puntaje as puntaje"
                    ,"products.nombre as nombre"
                    ,"detalle_reciclaje_grupos_productos.id as id"
                    ,"detalle_reciclaje_grupos_productos.estado as estado")
                ->get();
            return DataTables::of($productos)
                ->addColumn('action', function($productos){
                    $acciones ='';
                    if($productos->estado == '1') {
                        $acciones = '<a href="javascript:void(0)" onclick="editarDetalleProducto(' . $productos->id . ')" class=""><i class="fas fa-edit"></i></a>';
                        $acciones .= '&nbsp;&nbsp;<button type="button" onclick="AlertaDeshabilitarProducto('.$productos->id.')" name="delete" class="btn btn-danger">Deshabilitar</button>';
                    }else{
                        $acciones .= '&nbsp;&nbsp;<button onclick="AlertaHabilitarProducto('.$productos->id.')"  class="btn btn-secondary">habilitar</button>';
                    }
                    return $acciones;
                })
                ->rawColumns(['action'])
                ->make(true);
        }


    }

    public function crearDetalleProductos(Request $request)
    {

        if(DB::table('detalle_reciclaje_grupos_productos')->where('id_reciclaje_grupo',$request->idGrupo2)
            ->where('id_producto',$request->producto)->exists()){
            return 1;
        }else{
            DB::table('detalle_reciclaje_grupos_productos')->insert([
                'id_reciclaje_grupo' => $request->idGrupo2,
                'id_producto' => $request->producto,
                'cantidad' =>  $request->cantidad,
                'puntaje' => $this->calcularPuntajeProducto($request->producto, $request->cantidad)
            ]);
            $this->calcularDetalleGrupoProducto($request->idGrupo2);

            return 2;
        }

    }

    public function calcularPuntajeProducto($id,$cantidad){

        $producto = Producto::find($id);

        $resultado = $producto->puntaje*$cantidad;

        return $resultado;
    }


    public function calcularDetalleGrupoProducto($id){

        DB::table("reciclaje_grupos")
            ->where("id", "=", $id)
            ->update([
                "total_cantidad_productos_grupo"     => DB::raw("(select ifnull(sum(cantidad),0) from detalle_reciclaje_grupos_productos where id_reciclaje_grupo=".$id." and estado=1)"),
                "total_puntaje_productos_grupo" => DB::raw("(select ifnull(sum(puntaje),0) from detalle_reciclaje_grupos_productos where id_reciclaje_grupo=".$id." and estado=1)"),
            ]);

        $this->PuntajeTotalDetalle($id);
    }

    public function deshabilitar_habilitar_producto($id){

        $detalleReciclajeGrupo = detalle_grupos_productos::find($id);

        if($detalleReciclajeGrupo->estado == 1){
            $detalleReciclajeGrupo->estado = 0;
        }else{
            $detalleReciclajeGrupo->estado = 1;
        }

        $detalleReciclajeGrupo->save();

        $this->calcularDetalleGrupoProducto($detalleReciclajeGrupo->id_reciclaje_grupo);

        return back();
    }

    public function enviarEditarDetalleProducto($id){

        $detalleReciclajeGrupo = DB::table('detalle_reciclaje_grupos_productos')->where('id','=',$id)->get();

        return response()->json($detalleReciclajeGrupo);
    }

    public function ActualizarDetalleProducto(Request $request){

        DB::table('detalle_reciclaje_grupos_productos')
            ->where('id', '=',$request->id)
            ->update(['cantidad' => $request->cantidad,'puntaje' => $this->calcularPuntajeMaterial($request->id_producto,$request->cantidad)]);

        $this->calcularDetalleGrupoProducto($request->id_grupo);

        return  back();
    }


}
