<?php

namespace Congreso;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    protected $table ='contenidos';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=[
        'subtemas',
        'fecha',
        'hora_inicio',
        'hora_fin',
        'estado',
        'id_contenido'
    ];

    public function temarios(){
        return $this->belongsTo(Temario::class,'id_contenido','id');
    }
}
