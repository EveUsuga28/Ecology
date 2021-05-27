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
        
        $texto=trim($request->get('texto'));
        $puntajeProductos=DB::table('puntaje_products')  
                ->select('id','idproducto','fechaInicio','fechaFin','puntaje', 'estado')
                ->where('id','LIKE','%'.$texto.'%')
                ->orWhere('fechaInicio','LIKE','%'.$texto.'%')
                ->orWhere('fechaFin','LIKE','%'.$texto.'%')
                ->orWhere('puntaje','LIKE','%'.$texto.'%')
                ->orderBy('id', 'asc')
                ->paginate(10);
        return view('puntajeProducto.index', compact('puntajeProductos','texto'));
    }

    public function Crear($id)
    {
        $rol = auth()->user()->getRoleNames();
        if($rol[0]=='admin'){
        return view('puntajeProducto.create',compact('id'));
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

        return view('puntajeProducto.edit',compact('puntajeProducto'));
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
