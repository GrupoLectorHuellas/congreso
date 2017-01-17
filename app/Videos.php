<?php

namespace Congreso;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $table ='videos';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=[
        'url',
        'descripcion',
    ];
}
