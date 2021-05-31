<?php

namespace App\Http\Controllers;

use App\Models\material;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        $rol = auth()->user()->getRoleNames();

        if($rol[0]=='admin'){
         $datos['materials']=material::paginate();
        return view('material.index',$datos);

        }else{
            $material = material::all();
            return view('material.director', compact('material'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rol = auth()->user()->getRoleNames();

        if($rol[0]=='admin'){

        return view('material.create');
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
            'NomreMaterial'=>'max:20 | regex:/^[a-zA-Z \s]+$/',
            'Puntaje'=>' regex:/^[0-90-9 \s]+$/',
            'Kilos'=> 'regex:/^[0-90-9 \s]+$/',
            'Foto'=> 'max:10000|mimes:jpg,png,jpeg'
        ]);

       // $datosMaterial = request()->all();
        $datosMaterial = request()->except('_token');

        if($request->hasFile('Foto')){
            $datosMaterial['Foto']=$request->file('Foto')->store('uploads','public');
        }

        material::insert($datosMaterial);

        //return response()->json($datosMaterial);
        return redirect('material')->with('material','true');

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
        $rol = auth()->user()->getRoleNames();
        if($rol[0]=='admin'){

        $material =material::findOrFail($id);

        return view('material.edit',compact('material'));
        }
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
        $request->validate([
            'NomreMaterial'=>'max:20 | regex:/^[a-zA-Z \s]+$/',
            'Puntaje'=>' regex:/^[0-90-9 \s]+$/',
            'Kilos'=> 'regex:/^[0-90-9 \s]+$/',
            'Foto'=> 'max:10000|mimes:jpg,png,jpeg'
        ]);

        $datosMaterial = request()->except(['_token','_method']);

        if($request->hasFile('Foto')){
            $material =material::findOrFail($id);
            storage::delete('public/'.$material->Foto);
            $datosMaterial['Foto']=$request->file('Foto')->store('uploads','public');
        }

        material::where('id','=',$id)->update($datosMaterial);

        $material =material::findOrFail($id);

        return redirect('material')->with('EditPuntaje','true');
        //return view('material.edit',compact('material'));

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
    public function actualizarFechaPuntaje(){

        $now = Carbon::now();

        $puntaje = DB::table('puntajematerials')->where('Fecha_Fin','=',null)
            ->update(['Fecha_Fin'=>$now->format('Y-m-d')]);
    }


}

