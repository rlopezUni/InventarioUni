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

class ActivosController extends Controller
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
        $obj = new Objeto();
        $obj = $obj->all();

        $varPlantel = DB::table('areas')
                    ->join('planteles', function ($join){
                    $join->on('areas.id_plantel','=','planteles.id');
                    })->select('areas.id_plantel','planteles.descripcion')->distinct()->get();

        return view('activos',compact("obj","varPlantel"));
        }

        else
        {
            abort(403,'No tienes permiso');
        }
        
        

        
    }

    public function consulta_areas($plantel)
    {
        $area = Area::where("id_plantel",$plantel)->get();

        return response()->json($area->toArray());
    }


    /*
    public function consultaArea($id)
    {

        $consultaArea = Area::where("id_plantel",$id)->get();

        /*
        $areas = DB::table('areas')
        ->join('planteles', function ($join){
            $join->on('areas.id_plantel','=','planteles.id');
        })
        ->where('planteles.id',$consultaPlantel->id)
        ->select('planteles.descripcion', 'areas.descripcion')
        ->distinct()->get();
        *
        return view('dashboard',compact("consultaArea"));
    }
    */





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
        
        $activo = new Objeto;

        //Parte que sube la imagen

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $destinationPath = 'storage/';
            $filename = time().'-'.$file->getClientOriginalName();
            $uploadsuccess = $request->file('imagen')->move($destinationPath,$filename);
            $activo->imagen = $destinationPath . $filename;
        }


        $activo->serial  = $request->serial;
        $activo->descripcion  = $request->descripcion;
        $activo->modelo  = $request->modelo;
        $activo->marca  = $request->marca;
        $activo->id_plantel  = $request->plantel;
        $activo->id_area  = $request->area;
        $activo->save();

        return redirect('/activos')->with('guardaActivo','Activo creado correctamente');
    }

    public function eliminar($id)
    {
        $mod = Objeto::where('id',$id)->first();

        $url = str_replace('storage','public',$mod->imagen);

            //dd($url);

            Storage::delete($url);

        Objeto::where('id',$id)->delete();

        

        return redirect('/activos')->with('elimiActivos','Activo eliminado correctamente');
    }

    public function mostrarModificar($id)
    {
        $mod = Objeto::where('id',$id)->first();
        $varPlantel = DB::table('areas')
                    ->join('planteles', function ($join){
                    $join->on('areas.id_plantel','=','planteles.id');
                    })->select('areas.id_plantel','planteles.descripcion')->distinct()->get();

        //dd($varPlantel);

        return view('modificarActivos',compact("mod","varPlantel"));
    }

    public function modificar($id, Request $request)
    {

        $mod = Objeto::where('id',$id)->first();

            //Parte que modifica la imagen

            $url = str_replace('storage','public',$mod->imagen);

            //dd($url);

            Storage::delete($url);



            $file = $request->file('imagen');
            $destinationPath = 'storage/';
            $filename = time().'-'.$file->getClientOriginalName();
            $uploadsuccess = $request->file('imagen')->move($destinationPath,$filename);
            $mod->imagen = $destinationPath . $filename;
        

        $mod->serial = $request->serial;
        $mod->descripcion = $request->descripcion;
        $mod->modelo  = $request->modelo;
        $mod->marca  = $request->marca;
        $mod->id_plantel  = $request->plantel;
        $mod->id_area  = $request->area;
        $mod->save();

        return redirect("/activos")->with('modiActivos','Activo modificado correctamente');

    }

    public function mostrarMover($id)
    {
        $mod = Objeto::where('id',$id)->first();

        $varPlantel = DB::table('areas')
                    ->join('planteles', function ($join){
                    $join->on('areas.id_plantel','=','planteles.id');
                    })->select('areas.id_plantel','planteles.descripcion')->distinct()->get();

        /*dd($varPlantel);*/

        return view('moverActivos',compact("mod","varPlantel"));
    }

    public function mover($id, Request $request)
    {

        $mod = Objeto::where('id',$id)->first();
        $mod->id_plantel  = $request->plantel;
        $mod->id_area  = $request->area;
        $mod->save();

        return redirect("/activos")->with('moverActivos','Activo reubicado correctamente');

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