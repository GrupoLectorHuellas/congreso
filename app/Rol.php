<?php

namespace Congreso;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table ='roles';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=[
        'nombre',
        'descripcion',
    ];

    public function eventos(){
        return $this->hasMany(Evento::class);
    }
}
