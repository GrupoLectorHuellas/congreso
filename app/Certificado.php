<?php

namespace Congreso;

use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{
    protected $table ='certificados';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=[
        'id_inscripciones',
    ];

    public function inscripcion(){
        return $this->belongsTo(Inscripcion::class,'id_inscripciones','id');
    }

}
