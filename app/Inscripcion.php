<?php

namespace Congreso;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table ='inscripciones';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=[
        'id',
        'fecha',
        'estado',
        'validado',
        'evento_id',
        'usuario_id',

    ];

    public function usuario(){
        return $this->belongsTo(Usuario::class,'usuario_id','id');
    }
    public function evento(){
    return $this->belongsTo(Evento::class,'evento_id','id');
    }
    public function asistencias(){
        return $this->hasMany(Asistencia::class,'id_inscripciones');
    }
}
