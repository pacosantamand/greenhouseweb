<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invernadero extends Model
{
    protected $table = 'invernaderos';

    protected $fillable=['nombre','descripcion','responsable'];

    public function tareas(){
    	return $this->hasMany('App\Tarea','invernadero')->orderBy('id','desc');
    }

    public function encargado(){
    	return $this->belongsTo('App\User','responsable');
    }

    public function variables(){
    	return $this->belongsToMany('App\Variable');
    }

    public function colaboradores(){
    	return $this->belongsToMany('App\User');
    }
}
