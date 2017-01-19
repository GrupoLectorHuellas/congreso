<?php

namespace Congreso;

use Illuminate\Database\Eloquent\Model;

class Canton extends Model
{
    protected $table="cantones";
    protected $fillable=['nombre','id_provincias'];

    public static function cantones($id){
        return Canton::where('id_provincias','=',$id)->get();

    }
    public function provincia(){
        return $this->belongsTo(Provincia::class,'id_provincias','id');
    }


}
