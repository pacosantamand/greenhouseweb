<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
    protected $table='variables';

    protected $fillable = ['nombre','unidad_de_medida'];

}
