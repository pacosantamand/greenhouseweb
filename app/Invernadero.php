<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Invernadero extends Model
{
    protected $table = 'invernaderos';

    protected $fillable=['nombre','descripcion','responsable'];

    public function tareas(){
    	return $this->hasMany('App\Tarea','invernadero')->take(5)->orderBy('id','desc');
    }

    public function encargado(){
    	return $this->belongsTo('App\User','responsable');
    }

    public function variables(){
    	return $this->belongsToMany('App\Variable')->select('id','nombre');
    }

    public function colaboradores(){
    	return $this->belongsToMany('App\User');
    }

    public function ultimasLecturas(){
        $lecturas = [];
        foreach($this->variables as $variable){
            $lectura = Lectura::select('valor','created_at')->where([
                ['invernadero', '=', $this->id],
                ['variable','=',$variable->id]
            ])->take(10)->orderBy('created_at','desc')->get();
            $lecturas[]=['variableId'=>$variable->id,'data'=>$lectura];
        }   
        return json_encode($lecturas);   
    }
}
