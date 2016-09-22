<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table = 'tareas';

    public function colaborador(){
    	return $this->hasOne('App\User','id','user_id');
    }
}
