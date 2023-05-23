<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Objeto;
use App\Models\Area;
use App\Models\Plantele;
use App\Models\Role;

class CrearUsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $idUse = Auth::id();

        $rolUser = User::where('id',$idUse)->first();

        if($rolUser->rol == 1)
        {
        $usuario = new User();
        $usuario = $usuario->all();
        $roles = new Role();
        $roles = $roles->all();

        //$user->password = bcrypt($request->password);

        return view("crearusuarios",compact("usuario","roles"));
        }

        else
        {
            abort(403,'No tienes permiso');
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
        $usuario = new User;
        $usuario->name  = $request->usuario;
        $usuario->rol  = $request->rol;
        $usuario->email  = $request->correo;
        $usuario->password  = bcrypt($request->contraseña);
        //$user->password = bcrypt($request->password);
        $usuario->save();

        return redirect('/crear_usuarios')->with('guardaUsuario','Usuario creado correctamente'); 
        
    }

    public function eliminar($id)
    {
        User::where('id',$id)->delete();

        return redirect('/crear_usuarios')->with('elimiUsuarios','Usuario eliminado correctamente');
    }

    public function mostrarModificar($id)
    {
        $mod = User::where('id',$id)->first();
        $roles = new Role();
        $roles = $roles->all();

        return view('modificarUsuarios',compact('mod','roles'));
    }

    public function modificar($id, Request $request)
    {

        $usuario = User::where('id',$id)->first();
        $usuario->name  = $request->usuario;
        $usuario->rol  = $request->rol;
        $usuario->email  = $request->correo;
        $usuario->password  = bcrypt($request->contraseña);
        //$user->password = bcrypt($request->password);
        $usuario->save();

        return redirect('/crear_usuarios')->with('modiUsuario','Usuario modificado correctamente'); 

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}