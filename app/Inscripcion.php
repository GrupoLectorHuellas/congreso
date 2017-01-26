<?php

namespace Congreso;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table ='inscripciones';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=[
        'fecha',
        'estado',
        'validado',
        'evento_id',
        'usuario_id',

    ];
}
