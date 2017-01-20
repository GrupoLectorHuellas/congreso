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
        'estado',
        'id_temario'
    ];

    public function eventos(){
        return $this->belongsTo(Evento::class,'id_temario','id');
    }
}
