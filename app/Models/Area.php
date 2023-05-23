<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    /*protected $table = 'tickets_hist';

    /*
    public function nombreFuncion(){
        return $this->belongsTo(tablaReferencia::class,'llaveForanea','llavetablaReferencia');
    }
    

    public function responsable(){
        return $this->belongsTo(User::class,'responsable_id');
    }
     public function solicitante(){
        return $this->belongsTo(User::class,'solicitante_id');
    }
    */
     public function nombre_plantel(){
        return $this->belongsTo(Plantele::class,'id_plantel','id');
    }
}