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

    public function __construct(){
        $this->middleware('auth');

    }
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
       $this->actualizarFechaPuntaje();
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
    public function edit($id)
    {
        $puntajeProducto= puntajeProducto::findOrFail($id);

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
    public function update(Request $request, $id)
    {
        $datosPuntajeProducto = request()->except(['_token','_method']);

        puntajeProducto:: where('id','=',$id)->update($datosPuntajeProducto);

        $puntajeProducto= puntajeProducto::findOrFail($id);
       
        return redirect('puntajeProducto')->with('EditarPuntaje', 'true');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\puntajeProducto  $puntajeProducto
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        
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

    public function actualizarFechaPuntaje(){

        $now = Carbon::now();

        $puntaje = DB::table('puntaje_products')->where('fechaFin','=',null)
            ->update(['fechaFin'=>$now->format('Y-m-d H:i:s')]);
    }
}
