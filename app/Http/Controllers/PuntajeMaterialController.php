<?php

namespace App\Http\Controllers;

use App\Models\puntajeMaterial;
use CrearTablaPuntajeMaterials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\material;

class PuntajeMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $puntajeMaterials=DB::table('puntajeMaterials')
                ->select('idPuntajeMaterail','id_materials','Fecha_Inicio', 'Fecha_Fin','Puntaje')
                ->where('idPuntajeMaterail','LIKE','%'.$texto.'%')
                ->orWhere('Fecha_Inicio','LIKE','%'.$texto.'%')
                ->orWhere('Fecha_Fin','LIKE','%'.$texto.'%')
                ->orWhere('Puntaje','LIKE','%'.$texto.'%')
                ->orderBy('idPuntajeMaterail', 'asc')
                ->paginate(10);
                return view('puntajeMaterial.index', compact('puntajeMaterials','texto'));
        //$datosPuntajeMaterial['puntajeMaterials']=puntajeMaterial::paginate(5);
        //return view('puntajeMaterial.index',$datosPuntajeMaterial );
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Crear($id)
    {

        return view('puntajeMaterial.create',compact('id'));

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
       $datosPuntajeMaterial = request()->except('_token');
       puntajeMaterial::insert($datosPuntajeMaterial);

       $material =material::find($request->input('id_materials'));

        $material->fill(array('Puntaje' => $request->input('Puntaje')));

        $material->save();
        return redirect('puntajeMaterial')->with('mensaje','Material Creado Exitosamente');
        //return response()->json($datosPuntajeMaterial);
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

        return view('puntajeMaterial.edit',compact('puntajeMaterial'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\puntajeMaterial  $puntajeMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy($idPuntajeMaterail)
    {

        puntajeMaterial::destroy($idPuntajeMaterail);

        return redirect('puntajeMaterial');
    }
}
