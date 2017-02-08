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
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'id_temarios'
    ];

    public function temarios(){
        return $this->belongsTo(Temario::class,'id_temarios','id');
    }
}
