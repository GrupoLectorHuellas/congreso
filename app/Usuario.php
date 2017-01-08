<?php

namespace Congreso;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table='usuarios';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'id', 'nombres', 'apellidos','pais','ciudad','telefono','direccion','titulo','email', 'password','estado','id_carreras','id_cantones','id_roles',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function carrera(){
        return $this->belongsTo(Carrera::class,'id_carreras','id');
    }

    public function setPasswordAttribute($valor){
        if(!empty($valor)){
            $this->attributes['password'] = bcrypt($valor);
        }
    }
}
