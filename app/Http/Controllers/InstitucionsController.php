<?php

namespace App\Http\Controllers;

use App\Models\institucions;
use App\Models\User;
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
        $rol = auth()->user()->getRoleNames();


        if($rol[0]=='admin'){
            $texto=trim($request->get('texto'));
            $institucion=DB::table('institucions')
                    ->select('id','Nombre','Telefono', 'fechaRegistro','Foto','direccion')
                    ->where('id','LIKE','%'.$texto.'%')
                    ->orWhere('Nombre','LIKE','%'.$texto.'%')
                    ->orWhere('Telefono','LIKE','%'.$texto.'%')
                    ->orWhere('fechaRegistro','LIKE','%'.$texto.'%')
                    ->orWhere('direccion','LIKE','%'.$texto.'%')
                    ->orderBy('id', 'asc')
                    ->paginate();
            return view('institucion.index', compact('institucion','texto'));
        }else{
            $institucion = institucions::find(auth()->user()->id_institucion);
            return view('institucion.director', compact('institucion'));
        }


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

        $institucion = institucions::create($datosInstitucion);


        $this->asignarInstitucion($institucion->id);

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
    public function edit($id)
    {
        //
        $institucion = institucions::findOrFail($id);
        return view('institucion.edit',compact('institucion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\institucions  $institucions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosInstitucion = request()->except(['_token','_method']);

        if($request->hasFile('foto')){
            $instituto=institucions::findOrFail($id);
            Storage::delete('public/'.$instituto->Foto);
            $datosInstitucion['foto']=$request->file('foto')->store('uploads','public');
        }

        institucions::where('id','=',$id)->update($datosInstitucion);
        $institucion = institucions::findOrFail($id);

        return redirect('institucion')->with('EditInstitucion','true');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\institucions  $institucions
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $instituciones=institucions::findOrFail($id);

        if(Storage::delete('public/'.$instituciones->Foto)){
            institucions::destroy($id);
        }

        return redirect('institucion')->with('mensaje','Empleado eliminado exitosamente exitosamente');
    }

    public function asignarInstitucion($id){
        $usuario = User::find( auth()->user()->id);

        $usuario->id_institucion = $id;

        $usuario->save();
    }
}
