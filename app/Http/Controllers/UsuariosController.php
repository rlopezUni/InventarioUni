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

class UsuariosController extends Controller
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

        if($rolUser->rol == 2)
        {
        $obj = new Objeto();
        $obj = $obj->all();

        $varPlantel = DB::table('areas')
                    ->join('planteles', function ($join){
                    $join->on('areas.id_plantel','=','planteles.id');
                    })->select('areas.id_plantel','planteles.descripcion')->distinct()->get();

        return view("usuarios",compact("obj","varPlantel"));
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

    public function consulta_areas($plantel)
    {
        $area = Area::where("id_plantel",$plantel)->get();

        return response()->json($area->toArray());
    }

    public function mostrarPlanteles(Request $request)
    {

        $id_plantel = $request->plant;
        
        $obj = Objeto::where("id_plantel",$id_plantel)->get();

        return view("usuarios_plantel",compact("obj"));
    }

    public function mostrarPlanteles_Areas(Request $request)
    {

        $id_area = $request->area;
        
        $obj = Objeto::where("id_area",$id_area)->get();

        return view("usuarios_plantel_area",compact("obj"));
    }
    
    
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