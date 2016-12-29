<?php

namespace Congreso;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected $table='facultades';
    protected $fillable=['id','nombre'];

    public function carreras(){
        return $this->hasMany(Carrera::class);
    }
}
