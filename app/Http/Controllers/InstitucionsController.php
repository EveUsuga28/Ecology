<?php

namespace App\Http\Controllers;

use App\Models\institucions;
use Illuminate\Http\Request;

class InstitucionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['institucion']=institucions::paginate(5);
        return view('institucion.index',$datos);
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
        
        return response()->json($datosInstitucion);
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
    public function edit(institucions $institucions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\institucions  $institucions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, institucions $institucions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\institucions  $institucions
     * @return \Illuminate\Http\Response
     */
    public function destroy(institucions $institucions)
    {
        //
    }
}
