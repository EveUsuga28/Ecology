<?php

namespace App\Http\Controllers;

use App\Models\noticias;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PublicoController extends Controller
{
    //
    public function index()
    {
        /*if (Cache::has('noticias')){
            $noticias = Cache::get('noticias');
        }else{
            
            Cache::put('noticias',$noticias);
        }*/
        $noticias = noticias::all()->where('estado','=',1);
        //$datos['noticias']=noticias::paginate();
        //return view('noticias.index',$datos);
        return view('./auth/index',compact('noticias'));

        //$datosPuntajeMaterial['puntajeMaterials']=puntajeMaterial::paginate(6);
        //return view('puntajeMaterial.index',$datosPuntajeMaterial );
    }

    public function vista($id){
        $noticiaVista = noticias::findOrFail($id);
        $usuario = User::findOrFail($noticiaVista->id_users);
        //var_dump($noticiaVista);
        return view('noticias.noticia',compact('noticiaVista','usuario'));
    }
}
