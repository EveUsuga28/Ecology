<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:usuarios');
    }


    public function index(Request $request)
    {
        /*$texto=trim($request->get('texto'));
        $users=DB::table('users')
                ->select('id','name','tipo_doc','nro_documento', 'email','Estado')
                ->where('nro_documento','LIKE','%'.$texto.'%')
                ->orWhere('name','LIKE','%'.$texto.'%')
                ->orderBy('id', 'asc')
                ->paginate(10);
        return view('users.index', compact('users','texto'));
        */
        $datos['users']=user::paginate();
        return view('users.index',$datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'name'=>'max:20 | regex:/^[a-zA-Z \s]+$/',
            'nro_documento'=>' regex:/^[0-90-9 \s]+$/',
            'email'=> 'required|email|unique:users,email'
        ]);

        $usuario = User::create($request->only('name','tipo_doc','nro_documento','email','Estado')
        +[
            'password' => bcrypt($request->input('password')),
        ]);

        $usuario->assignRole($request->input('rol'));

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>'max:20 | regex:/^[a-zA-Z \s]+$/',
            'nro_documento'=>' regex:/^[0-90-9 \s]+$/'
        ]);
        $data = $request->only('name','tipo_doc','nro_documento', 'email');
        $password=$request->input('password');
        if($password)
            $data['password'] = bcrypt($password);


        $user->update($data);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function Deshabilitar($id)
    {

        $User = User::find($id);

        if($User->Estado == 'habilitado')
        {
            $User->Estado = 'Deshabilitado';
        }else
        {
            $User->Estado = 'habilitado';
        }

        $User->save();

        return redirect()->route('users.index')->with('eliminar' , 'true');
    }
}
