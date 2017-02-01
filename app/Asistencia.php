<?php

namespace Congreso;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table ='asistencia';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=[
        'fecha',
        'hora_primera_inicial',
        'hora_primera_final',
        'hora_segunda_inicial',
        'hora_segunda_final',
        'estado',
        'id_asistencia',
        
    ];

    public function inscripciones(){
        return $this->belongsTo(Inscripcion::class,'id_asistencia','id');
    }
}
