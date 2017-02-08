<?php

namespace Congreso;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Firma extends Model
{
    protected $table ='firmas';
    protected $primaryKey='id';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable=[
        'id',
        'abreviatura',
        'nombre',
        'apellidos',
        'path',
        'estado',
    ];

    public function setPathAttribute($path){

        if(!empty($path)){
            /* Para Actualizar Imagen */
            if(!empty($this->attributes['path'])){
                \Storage::delete($this->attributes['path']);
            }
            $this->attributes['path'] = Carbon::now()->second.$path->getClientOriginalName();
            $name = Carbon::now()->second.$path->getClientOriginalName();
            \Storage::disk('local')->put($name, \File::get($path));
        }
    }
}
