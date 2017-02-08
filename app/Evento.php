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

    protected $date=[
        //'fecha_inicio',
        //'fecha_fin',
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
        return $this->hasMany(Temario::class,'id_temario');//corregir cuando la migracin temario tenga id_eventos
    }

    public function expositores(){
         return $this->belongsToMany(Expositor::class);
    }

    public function firmas(){
         return $this->belongsToMany(Firma::class);
    }
    public function usuarios(){
        return $this->belongsToMany(Usuario::class,'inscripciones');
    }

    public function asistencias(){
        return $this->belongsToMany(Asistencia::class,'inscripciones');
    }

    public function inscripcion(){
        return $this->hasMany(Inscripcion::class);
    }

    public static function eventosNoMatriculados($id){
        $array = array();
        $usuario = Usuario::find($id);
        foreach($usuario->eventos as $eventos_propio) {
            $array[] = $eventos_propio->id; //los id de los eventos que el usuario tine matricula
        }
        return Evento::whereNotIn('id', $array)->get();
    }

    public static function eventosMatriculados($id){
        $array = array();
        $usuario = Usuario::find($id);
        foreach($usuario->eventos as $eventos_propio) {
            $array[] = $eventos_propio->id; //los id de los eventos que el usuario tine matricula
        }
        return Evento::whereIn('id', $array)->get();
    }

    public static function eventosMatriculadosValidados($id_usuario){
        $array = array();
        $usuario = Usuario::find($id_usuario);
        $date = Carbon::now();
        $date = $date->format('Y-m-d');
        foreach($usuario->eventos as $eventos_propio) {
            $inscripcion = Inscripcion::where('usuario_id', $id_usuario)->where('evento_id', $eventos_propio->id)->get();
            foreach($eventos_propio->inscripcion as $evento_inscripcion){
                if($evento_inscripcion->validado==1) {
                    foreach ($inscripcion as $inscripcion) {
                        //descomentar cuando se desea registrar validando el dia
                        /*
                        $asistencia = Asistencia::where('fecha', $date)->where('id_inscripciones', $inscripcion->id)->count();
                        if ($asistencia == 0) {
                            $array[] = $eventos_propio->id;
                        }
                        */
                        $array[] = $eventos_propio->id;


                    }
                }
            }
        }
        return Evento::whereIn('id', $array)->get();
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
