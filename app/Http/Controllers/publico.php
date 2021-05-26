<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;
use App\Models\noticias;
use Illuminate\Http\Request;

class publico extends Controller
{
    public function __invoke(){
        //solo necesita recuperar los datos con el metodo all y mandarlos con un compact
        

        if (Cache::has('noticias')){
            $noticias = Cache::get('noticias');
        }else{
            $noticias = noticias::all();
            Cache::put('noticias',$noticias);
        }
        
        return view('./auth/index',compact('noticias'));
    }
}
