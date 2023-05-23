<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Area;
use App\Models\Plantele;

class AreasController extends Controller
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
        $varArea = new Area();
        $varArea = $varArea->all();
        $plant = new Plantele();
        $plant = $plant->all();
    
        return view('areas',compact("varArea","plant"));
        }

        else
        {
            abort(403,'No tienes permiso');
        }        
    }

    public function eliminar($id)
    {
        Area::where('id',$id)->delete();

        return redirect('/areas')->with('elimiAreas','Area eliminada correctamente');
    }

    public function mostrarModificar($id)
    {
        $mod = Area::where('id',$id)->first();
        $plant = new Plantele();
        $plant = $plant->all();

        return view('modificarAreas',compact('mod','plant'));
    }

    public function modificar($id, Request $request)
    {

        $mod = Area::where('id',$id)->first();
        $mod->descripcion = $request->area;
        $mod->id_plantel = $request->plantel;
        $mod->save();

        return redirect("/areas")->with('modiAreas','Area modificada correctamente');

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
        $area = new Area;
        $area->descripcion  = $request->area;
        $area->id_plantel  = $request->plantel;
        $area->save();

        return redirect('/areas')->with('guardaArea','Area creada correctamente');
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