<?php

namespace App\Http\Controllers;
use App\Models\reciclaje_institucion;
use Illuminate\Http\Request;

class reciclajeIntitucionControlller extends Controller
{
    public function index(){

        $rol = auth()->user()->getRoleNames();

       if($rol[0]=='admin'){
           $reciclaje_institucion = reciclaje_institucion::all();

       }else{
           $reciclaje_institucion = reciclaje_institucion::all()
               ->where('id_institucion', '=',auth()->user()->id_institucion);

       }

        return view("reciclaje.index",compact('reciclaje_institucion'));
    }



}
