<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table = 'tareas';

    protected $fillable = ['nombre','descripcion','responsable'];

    public function responsable(){
    	return $this->hasOne('App\User','responsable');
    }
}
