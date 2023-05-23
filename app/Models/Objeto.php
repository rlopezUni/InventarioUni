<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objeto extends Model
{
    use HasFactory;

    protected $table = 'objetos';

    /*
    public function nombreFuncion(){
        return $this->belongsTo(tablaReferencia::class,'llaveForanea','llavetablaReferencia');
    }
    

    public function responsable(){
        return $this->belongsTo(User::class,'responsable_id');
    }*/

     public function nombre_area(){
        return $this->belongsTo(Area::class,'id_area','id');
    }

     public function nombre_plantel(){
        return $this->belongsTo(Plantele::class,'id_plantel','id');
    }
}