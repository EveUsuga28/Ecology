<?php

namespace App\Http\Controllers;

use App\Models\noticias;
use Illuminate\Http\Request;

class publico extends Controller
{
    public function __invoke(){

        $noticias = noticias::all();

        return view('./auth/index',compact('noticias'));

    }
}
