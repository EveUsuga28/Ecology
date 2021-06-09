<?php

namespace App\Http\Controllers;

use App\Models\puntajeProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Producto;
use Symfony\Component\Console\Input\Input;

class PuntajeProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $puntajeProductos = puntajeProducto::all();

        $nameProduct = Producto::all();

        return view('puntajeProducto.index', compact('puntajeProductos','nameProduct'));
    }

    public function Crear($id)
    {
        $rol = auth()->user()->getRoleNames();
        $nombredeunproducto = Producto::findOrFail($id);
        if($rol[0]=='admin'){
        return view('puntajeProducto.create',compact('nombredeunproducto'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'puntaje'=>' regex:/^[0-90-9 \s]+$/',
        ]);
        // $datosPuntajeMaterial = request()->all();
       $datosPuntajeProducto = request()->except('_token');
       puntajeProducto::insert($datosPuntajeProducto);
     
        
        $producto =Producto::find($request->input('idproducto'));

        $producto->fill(array('puntaje' => $request->input('puntaje')));
      
        $producto->save();
        
        return redirect('puntajeProducto')->with('puntajeProducto','true');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\puntajeProducto  $puntajeProducto
     * @return \Illuminate\Http\Response
     */
    public function show(puntajeProducto $puntajeProducto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\puntajeProducto  $puntajeProducto
     * @return \Illuminate\Http\Response
     */
    public function edit($idPuntajeProducto)
    {
        $puntajeProducto= puntajeProducto::findOrFail($idPuntajeProducto);

        $NameOfProduct = Producto::findOrFail($puntajeProducto->idproducto);

        return view('puntajeProducto.edit',compact('puntajeProducto','NameOfProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\puntajeProducto  $puntajeProducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idPuntajeProducto)
    {
        $datosPuntajeProducto = request()->except(['_token','_method']);

        puntajeProducto:: where('idPuntajeProducto','=',$idPuntajeProducto)->update($datosPuntajeProducto);

        $puntajeProducto= puntajeProducto::findOrFail($idPuntajeProducto);
       
        return view('puntajeProducto.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\puntajeProducto  $puntajeProducto
     * @return \Illuminate\Http\Response
     */
    public function destroy($idPuntajeProducto)
    {
        puntajeProducto::destroy($idPuntajeProducto);

        return redirect('puntajeProducto');
    }

    public function Deshabilitar($id)
    {

        $puntajeProducto = puntajeProducto::find($id);

        if($puntajeProducto->estado == 'habilitado')
        {
            $puntajeProducto->estado = 'Deshabilitado';
        }else
        {
            $puntajeProducto->estado = 'habilitado';
        }

        $puntajeProducto->save();

        return redirect()->route('puntajeProducto.index')->with('eliminar' , 'true');
    }
}
