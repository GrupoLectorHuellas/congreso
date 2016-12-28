<?php

namespace Congreso;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected $table='facultades';
    protected $fillable=['nombre'];

    public function usuarios(){
        return $this->hasMany('Usuario');
    }
}
