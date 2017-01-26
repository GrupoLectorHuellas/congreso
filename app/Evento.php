<?php

namespace Congreso;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table ='eventos';
    public $timestamps = false;
    protected $fillable=[
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'precio_estudiante',
        'precio_profesional',
        'path',
        'id_categorias',
        'estado',
    ];


    public function getFechaInicioAttribute()
    {
        return Carbon::parse($this->attributes['fecha_inicio'])->format('m/d/Y');
    }
    public function getFechaFinAttribute()
    {
        return Carbon::parse($this->attributes['fecha_fin'])->format('m/d/Y');
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class,'id_categorias','id');
    }

     public function temarios(){
        return $this->hasMany(Temario::class);
    }

    public function expositores(){
         return $this->belongsToMany(Expositor::class);
    }
    public function usuarios(){
        return $this->belongsToMany(Usuario::class);
    }



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
