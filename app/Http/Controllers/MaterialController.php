<?php

namespace App\Http\Controllers;

use App\Models\material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class MaterialController extends Controller
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
         $datos['materials']=material::paginate(5);
        return view('material.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('material.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $datosMaterial = request()->all();
        $datosMaterial = request()->except('_token');

        if($request->hasFile('Foto')){
            $datosMaterial['Foto']=$request->file('Foto')->store('uploads','public');
        }

        material::insert($datosMaterial);

        //return response()->json($datosMaterial);
        return redirect('material')->with('mensaje','Material Creado Exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $material =material::findOrFail($id);

        return view('material.edit',compact('material'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosMaterial = request()->except(['_token','_method']);

        if($request->hasFile('Foto')){
            $material =material::findOrFail($id);
            storage::delete('public/'.$material->Foto);
            $datosMaterial['Foto']=$request->file('Foto')->store('uploads','public');
        }

        material::where('id','=',$id)->update($datosMaterial);

        $material =material::findOrFail($id);
        return view('material.edit',compact('material'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /**$material =material::findOrFail($id);
        if(storage::delete('public/'.$material->Foto))
        {
            material::destroy($id);
        }

        return redirect('material')->with('mensaje','Material Borrado');**/
    }
}
