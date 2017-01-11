<?php

namespace Congreso;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table="provincias";
    protected $fillable=['nombre'];
}
