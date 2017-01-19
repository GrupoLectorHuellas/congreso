<?php

namespace Congreso;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Categoria extends Model
{
    protected $table ='categorias';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=[
        'nombre',
        'descripcion',
        'estado'
    ];

    public function eventos(){
        return $this->hasMany(Evento::class);
    }

}
