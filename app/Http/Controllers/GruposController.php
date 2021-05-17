<?php

namespace App\Http\Controllers;

use App\Models\institucions;
use App\Models\grupos;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class GruposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $texto=trim($request->get('texto'));
        $grupo=DB::table('grupos')
                ->select('id_grupo','Grupo','ID_Instituciones', 'Estado')
                ->where('id_grupo','LIKE','%'.$texto.'%')
                ->orWhere('Grupo','LIKE','%'.$texto.'%')
                ->orWhere('ID_Instituciones','LIKE','%'.$texto.'%')
                ->orWhere('Estado','LIKE','%'.$texto.'%')
                ->orderBy('id_grupo', 'asc')
                ->paginate(10);
        return view('grupo.index', compact('grupo','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos['institucion']=institucions::all();
        return view('grupo.create',$datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosgrupo = request()->except('_token');

        grupos::insert($datosgrupo);
        
        return redirect('grupo')->with('mensaje','Empleado agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    public function show(grupos $grupos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    public function edit( $id_grupo)
    {
        
        $datos['institucion']=institucions::all();
        //return view('grupo.create',$datos);
//------------------------------------------
        $grupo = grupos::findOrFail($id_grupo);
        $ID_Instituciones = $grupo->ID_Instituciones;
        $institucion = institucions::findOrFail($ID_Instituciones);

        $grupo = grupos::findOrFail($id_grupo);
        return view('grupo.edit',compact('grupo', 'institucion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_grupo)
    {
        $datosgrupo = request()->except(['_token','_method']);

        grupos::where('id_grupo','=',$id_grupo)->update($datosgrupo);
        $grupo = grupos::findOrFail($id_grupo);
        return view('grupo.edit',compact('grupo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_grupo)
    {
        //

        grupos::destroy($id_grupo);
        return redirect('grupo')->with('mensaje','Grupo eliminado exitosamente exitosamente');
    }
}