<?php

namespace App\Http\Controllers;

use App\Models\noticias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $noticias=DB::table('noticias')
                ->select('id_noticia','titulo','contexto','Fecha', 'estado', 'Foto')
                ->where('titulo','LIKE','%'.$texto.'%')
                ->orWhere('id_noticia','LIKE','%'.$texto.'%')
                ->orWhere('contexto','LIKE','%'.$texto.'%')
                ->orderBy('id_noticia', 'asc')
                ->paginate(10);
        return view('noticias.index', compact('noticias','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('noticias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosNoticias = request()->except('_token');

        if($request->hasFile('Foto')){
            $datosNoticias['Foto']=$request->file('Foto')->store('uploads','public');
        }
        noticias::insert($datosNoticias);

        return response()->json($datosNoticias);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\noticias  $noticias
     * @return \Illuminate\Http\Response
     */
    public function show(noticias $noticias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\noticias  $noticias
     * @return \Illuminate\Http\Response
     */
    public function edit($id_noticia)
    {
        $noticias =noticias::findOrFail($id_noticia);

        return view('noticias.edit',compact('noticias'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\noticias  $noticias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id_noticia)
    {
        $datosNoticia = request()->except(['_token','_method']);

        if($request->hasFile('Foto')){
            $noticias =noticias::findOrFail($id_noticia);
            storage::delete('public/'.$noticias->Foto);
            $datosNoticia['Foto']=$request->file('Foto')->store('uploads','public');
        }

        noticias::where('id_noticia','=',$id_noticia)->update($datosNoticia);

        $noticias =noticias::findOrFail($id_noticia);
        return view('noticias.edit',compact('noticias'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\noticias  $noticias
     * @return \Illuminate\Http\Response
     */
    public function destroy(noticias $noticias)
    {
        //
    }

    public function Deshabilitar($id_noticia)
    {

        $Noticia = noticias::find($id_noticia);

        if($Noticia->estado == 1)
        {
            $Noticia->estado = 0;
        }else
        {
            $Noticia->estado = 1;
        }

        $Noticia->save();

        return redirect()->route('noticias.index')->with('eliminar' , 'true');
    }
}