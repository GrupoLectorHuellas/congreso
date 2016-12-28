<?php

namespace Congreso;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table='usuarios';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'id', 'nombres', 'apellidos','ciudad','telefono','email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Facultad(){
        return $this->belongsTo('Facultad');
    }
}
