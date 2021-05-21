<?php

namespace App\Http\Controllers;

use App\Models\noticias;
use Illuminate\Http\Request;

class publico extends Controller
{
    public function __invoke(){
        //solo necesita recuperar los datos con el metodo all y mandarlos con un compact
        $noticias = noticias::all();

        return view('./auth/index',compact('noticias'));

    }
}
