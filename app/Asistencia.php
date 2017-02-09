<?php

namespace Congreso;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


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
        'id_inscripciones',
        
    ];
    public function getFechaAttribute()
    {
        return Carbon::parse($this->attributes['fecha'])->format('d/m/Y');
    }

    public function inscripciones(){
        return $this->belongsTo(Inscripcion::class,'id_inscripciones','id');
    }
}
