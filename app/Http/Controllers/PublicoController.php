<?php

namespace App\Http\Controllers;

use App\Models\noticias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PublicoController extends Controller
{
    //
    public function index()
    {
        if (Cache::has('noticias')){
            $noticias = Cache::get('noticias');
        }else{
            $noticias = noticias::all();
            Cache::put('noticias',$noticias);
        }
        //$datos['noticias']=noticias::paginate();
        //return view('noticias.index',$datos);
        return view('./auth/index',compact('noticias'));

        //$datosPuntajeMaterial['puntajeMaterials']=puntajeMaterial::paginate(6);
        //return view('puntajeMaterial.index',$datosPuntajeMaterial );
    }

    public function vista($id){
        $noticiaVista = noticias::findOrFail($id);
        //var_dump($noticiaVista);
        return view('noticias.noticia',compact('noticiaVista'));
    }
}
