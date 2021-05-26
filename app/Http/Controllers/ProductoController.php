<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $productos=DB::table('products')  
                ->select('id','nombre','puntaje', 'foto', 'estado')
                ->where('id','LIKE','%'.$texto.'%')
                ->orWhere('nombre','LIKE','%'.$texto.'%')
                ->orderBy('id', 'asc')
                ->paginate(10);
        return view('producto.index', compact('productos','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.create');
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
        $datosProducto = request()->except('_token');

        if($request->hasFile('foto')){
            $datosProducto['foto']=$request->file('foto')->store('uploads','public');
        }

        Producto::insert($datosProducto);

        //return response()->json($datosMaterial);
        return redirect('producto')->with('mensaje','Producto Creado Exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto =Producto::findOrFail($id);

        return view('producto.edit',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosProducto = request()->except(['_token','_method']);

        if($request->hasFile('foto')){
            $producto =Producto::findOrFail($id);
            storage::delete('public/'.$producto->foto);
            $datosProducto['foto']=$request->file('foto')->store('uploads','public');
        }

        Producto::where('id','=',$id)->update($datosProducto);

        $producto =Producto::findOrFail($id);
        //return view('producto.edit',compact('producto'));
        return redirect()->route('producto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }

    public function Deshabilitar($id)
    {

        $producto = Producto::find($id);

        if($producto->estado == 'habilitado')
        {
            $producto->estado = 'Deshabilitado';
        }else
        {
            $producto->estado = 'habilitado';
        }

        $producto->save();

        return redirect()->route('producto.index')->with('eliminar' , 'true');
    }
}
