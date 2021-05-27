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
                ->select('id','Grupo','id', 'Estado')
                ->where('id','LIKE','%'.$texto.'%')
                ->orWhere('Grupo','LIKE','%'.$texto.'%')
                ->orWhere('id','LIKE','%'.$texto.'%')
                ->orWhere('Estado','LIKE','%'.$texto.'%')
                ->orderBy('id', 'asc')
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
    public function edit( $id)
    {

        $datos['institucion']=institucions::all();
        //return view('grupo.create',$datos);
//------------------------------------------
        $grupo = grupos::findOrFail($id);
        $id = $grupo->id;
        $institucion = institucions::findOrFail($id);

        $grupo = grupos::findOrFail($id);
        return view('grupo.edit',compact('grupo', 'institucion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosgrupo = request()->except(['_token','_method']);

        grupos::where('id','=',$id)->update($datosgrupo);
        $grupo = grupos::findOrFail($id);
        return view('grupo.edit',compact('grupo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        grupos::destroy($id);
        return redirect('grupo')->with('mensaje','Grupo eliminado exitosamente exitosamente');
    }
}
