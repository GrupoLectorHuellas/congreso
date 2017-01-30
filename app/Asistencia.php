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
        'hora',
        'estado',
        'id_asistencia',
        
    ];

    public function inscripciones(){
        return $this->belongsTo(Inscripcion::class,'id_asistencia','id');
    }
}
