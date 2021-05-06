<?php

namespace App\Http\Controllers;

use App\Models\institucions;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class InstitucionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $institucion=DB::table('institucions')
                ->select('ID_Instituciones','Nombre','Telefono', 'fecha_Registro','Foto','direccion')
                ->where('ID_Instituciones','LIKE','%'.$texto.'%')
                ->orWhere('Nombre','LIKE','%'.$texto.'%')
                ->orWhere('Telefono','LIKE','%'.$texto.'%')
                ->orWhere('fecha_Registro','LIKE','%'.$texto.'%')
                ->orWhere('direccion','LIKE','%'.$texto.'%')
                ->orderBy('ID_Instituciones', 'asc')
                ->paginate(10);
        return view('institucion.index', compact('institucion','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('institucion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {/*
        $datosInstitucion = request()->all();*/
        $datosInstitucion = request()->except('_token');
        
        if($request->hasFile('foto')){
            $datosInstitucion['foto']=$request->file('foto')->store('uploads','public');
        }

        institucions::insert($datosInstitucion);
        
        return redirect('institucion')->with('mensaje','Empleado agregado exitosamente');
        //return response()->json($datosInstitucion);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\institucions  $institucions
     * @return \Illuminate\Http\Response
     */
    public function show(institucions $institucions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\institucions  $institucions
     * @return \Illuminate\Http\Response
     */
    public function edit($ID_Instituciones)
    {
        //
        $institucion = institucions::findOrFail($ID_Instituciones);
        return view('institucion.edit',compact('institucion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\institucions  $institucions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ID_Instituciones)
    {
        //
        $datosInstitucion = request()->except(['_token','_method']);

        if($request->hasFile('foto')){
            $instituto=institucions::findOrFail($ID_Instituciones);
            Storage::delete('public/'.$instituto->Foto);
            $datosInstitucion['foto']=$request->file('foto')->store('uploads','public');
        }

        institucions::where('ID_Instituciones','=',$ID_Instituciones)->update($datosInstitucion);
        $institucion = institucions::findOrFail($ID_Instituciones);
        return view('institucion.edit',compact('institucion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\institucions  $institucions
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID_Instituciones)
    {
        // 
        $instituciones=institucions::findOrFail($ID_Instituciones);

        if(Storage::delete('public/'.$instituciones->Foto)){
            institucions::destroy($ID_Instituciones);
        }

        return redirect('institucion')->with('mensaje','Empleado eliminado exitosamente exitosamente');
    }
}
