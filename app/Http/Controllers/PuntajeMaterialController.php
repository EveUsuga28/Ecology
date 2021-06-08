<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\puntajeMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\material;

class PuntajeMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');

    }

    public function index(Request $request)
    {

        $datosPuntajeMaterial = puntajeMaterial::all();

        //$datosPuntajeMaterial['puntajeMaterials']=puntajeMaterial::paginate(6);

        $nombredelmaterial = material::all();

        //return view('puntajeMaterial.index',$datosPuntajeMaterial,$nombredelmaterial);
        return view('puntajeMaterial.index',compact('datosPuntajeMaterial','nombredelmaterial'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Crear($id)
    {
        $rol = auth()->user()->getRoleNames();
        if($rol[0]=='admin'){
        $nombreMaterial = material::findOrFail($id);
        return view('puntajeMaterial.create',compact('nombreMaterial'));
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'Puntaje'=>' regex:/^[0-90-9 \s]+$/',
        ]);
       // $datosPuntajeMaterial = request()->all();
       $this->actualizarFechaPuntaje();
       $datosPuntajeMaterial = request()->except('_token');
       puntajeMaterial::insert($datosPuntajeMaterial);

       $material =material::find($request->input('id_materials'));

        $material->fill(array('Puntaje' => $request->input('Puntaje')));


        $material->save();
        return redirect('puntajeMaterial')->with('puntaje','true');
      //  return response()->json($datosPuntajeMaterial);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\puntajeMaterial  $puntajeMaterial
     * @return \Illuminate\Http\Response
     */
    public function show(puntajeMaterial $puntajeMaterial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\puntajeMaterial  $puntajeMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit($idPuntajeMaterail)
    {
        $puntajeMaterial= puntajeMaterial::findOrFail($idPuntajeMaterail);

        return view('puntajeMaterial.edit',compact('puntajeMaterial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\puntajeMaterial  $puntajeMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idPuntajeMaterail)
    {
        $datosPuntajeMaterial = request()->except(['_token','_method']);

        puntajeMaterial:: where('idPuntajeMaterail','=',$idPuntajeMaterail)->update($datosPuntajeMaterial);

        $puntajeMaterial= puntajeMaterial::findOrFail($idPuntajeMaterail);

        return redirect('puntajeMaterial')->with('EditPuntaje', 'true');
        //return view('puntajeMaterial.edit',compact('puntajeMaterial'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\puntajeMaterial  $puntajeMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy($idPuntajeMaterail)
    {

       // puntajeMaterial::destroy($idPuntajeMaterail);

        //return redirect('puntajeMaterial');
    }
    public function Deshabilitar($idPuntajeMaterail)
    {

            $puntajeMaterial = puntajeMaterial::find($idPuntajeMaterail);

            if($puntajeMaterial->Estado == 'habilitado')
            {
                $puntajeMaterial->Estado = 'Deshabilitado';
            }else
            {
                $puntajeMaterial->Estado = 'habilitado';
            }

            $puntajeMaterial->save();

            return redirect()->route('puntajeMaterial.index')->with('eliminar' , 'true');
        }
        public function actualizarFechaPuntaje(){

            $now = Carbon::now();

            $puntaje = DB::table('puntajematerials')->where('Fecha_Fin','=',null)
                ->update(['Fecha_Fin'=>$now->format('Y-m-d H:i:s')]);
        }
}
