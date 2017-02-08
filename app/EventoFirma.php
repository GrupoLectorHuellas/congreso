<?php

namespace Congreso;

use Illuminate\Database\Eloquent\Model;

class EventoFirma extends Model
{
    protected $table ='evento_firma';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=[
        'evento_id',
        'firma_id',

    ];

}
