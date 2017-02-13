<?php

namespace Congreso;

use Illuminate\Database\Eloquent\Model;

class Temario extends Model
{
    protected $table ='temario';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=[
        'nombre',
        'duracion',
        'estado',
        'id_temario'
    ];

    public function eventos(){
        return $this->belongsTo(Evento::class,'id_temario','id');
    }

    public function contenidos(){
        return $this->hasMany(Contenido::class,'id_temarios');//corregir cuando la migracin temario tenga id_eventos
    }
}
