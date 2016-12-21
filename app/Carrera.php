<?php

namespace Congreso;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table='carreras';
    protected $fillable=['nombre','id_facultades'];
    public static function carreras($id){
        return Carrera::where('id_facultades','=',$id)->get();

    }
}
