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
        $rol = auth()->user()->getRoleNames();

        if ($rol[0]=='admin') {
            $grupo = grupos::all();
            $institucion = institucions::all();
            return view('grupo.index',compact('grupo','institucion'));
        }else{
            $id = auth()->user()->id_institucion;
            $institucion = institucions::all();
            $grupo = grupos::all()->where('id_institucion','=',$id);
            return view('grupo.index',compact('grupo'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos=institucions::all();
        return view('grupo.create',compact('datos'));
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

        //$datos['institucion']=institucions::all();
        //return view('grupo.create',$datos);
//------------------------------------------
        $grupo = grupos::findOrFail($id);
        $idInstitucion = $grupo->id_institucion;
        $institucion = institucions::findOrFail($idInstitucion);

        //$grupo = grupos::findOrFail($id);
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

        return redirect('grupo')->with('EditGrupo','true');
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
