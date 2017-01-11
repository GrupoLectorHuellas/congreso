<?php

namespace Congreso;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carrera extends Model
{
    protected $table='carreras';
    protected $fillable=['id','nombre','id_facultades'];
    public static function carreras($id){
        return Carrera::where('id_facultades','=',$id)->get();

    }

    public function usuarios(){
        return $this->hasMany(Usuario::class);
    }

    public function facultad(){
        #el egundo parametro es el nombre de la clave foranea, y la tercera si la tabla referenciada tiene
        # un primary key diferente a id, osea se le dio otro nombre diferente  a id
        return $this->belongsTo(Facultad::class,'id_facultades','id');
    }
}
