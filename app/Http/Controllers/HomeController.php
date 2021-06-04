<?php

namespace App\Http\Controllers;
use App\models\institucions;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rol = auth()->user()->getRoleNames();

        $idInstitucion = auth()->user()->id_institucion;

        if ($rol[0]=='admin') {
            return view('home');

        }else{

            if ($idInstitucion == Null) {
                return view('institucion.create');
            }else{
                return view('home');
            }

            
        }

        
    }
    public function informeNombres($id)
    {
        $institucion =institucions::findOrFail($id);

        return view('informes/index',compact('institucion'));
    }

}
