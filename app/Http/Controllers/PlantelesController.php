<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Plantele;

class PlantelesController extends Controller
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
        $plant = new Plantele();
        $plant = $plant->all();
    
        return view('planteles',compact("plant"));
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
        $pla = new Plantele;
        $pla->descripcion  = $request->plantel;
        $pla->save();

        return redirect('/planteles')->with('guardaPlantel','Plantel creado correctamente');
    }

    public function eliminar($id)
    {
        Plantele::where('id',$id)->delete();

        return redirect('/planteles')->with('elimiPlanteles','Plantel eliminado correctamente');
    }

    public function mostrarModificar($id)
    {
        $mod = Plantele::where('id',$id)->first();

        return view('modificarPlanteles',compact('mod'));
    }

    public function modificar($id, Request $request)
    {

        $mod = Plantele::where('id',$id)->first();
        $mod->descripcion = $request->plantel;
        $mod->save();

        return redirect("/planteles")->with('modiPlanteles','Plantel modificado correctamente');

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