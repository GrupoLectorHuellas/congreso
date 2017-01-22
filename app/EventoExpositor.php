<?php

namespace Congreso;

use Illuminate\Database\Eloquent\Model;

class EventoExpositor extends Model
{
    protected $table ='evento_expositor';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=[
        'evento_id',
        'expositor_id',

    ];


}
