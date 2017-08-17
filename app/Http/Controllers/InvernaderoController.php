<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Invernadero;
use App\Lectura;
use App\Tarea;
use App\User;
use App\Variable;
use Illuminate\Http\Request;

class InvernaderoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
    	$invernaderos = Invernadero::paginate(10);
    	return view('invernaderos.index',['invernaderos'=>$invernaderos]);
    }

    public function create(){
    	$variables = Variable::all();
    	$agronomos = User::where('tipo', '=', 'agronomo')->get();
        $colaboradores = User::where('tipo', '=', 'colaborador')->get();
    	return view('invernaderos.create',['variables'=>$variables,'agronomos'=>$agronomos,'colaboradores'=>$colaboradores]);
    }

    public function store(Request $request)
    {
        $invernadero = Invernadero::create($request->all());
        $colaboradores = $request->input('colaboradores');
        $variables = $request->input('variables');
        $invernadero->colaboradores()->sync($colaboradores);
        $invernadero->variables()->sync($variables);

        return redirect('invernaderos')->with(['mensaje'=>'El invernadero se creo correctamente']);
    }

    public function show($id){
        $invernadero = Invernadero::find($id);
        $map = $this->createMap($invernadero->latitud,$invernadero->longitud);
        return view('invernaderos.show',['invernadero'=>$invernadero,'map'=>$map]);
    }

    public function edit($id){
        $invernadero= Invernadero::find($id);
        $variables = Variable::all();
        $users = User::where('tipo', '=', 'agronomo')->get();
        return view('invernaderos.edit',['invernadero'=>$invernadero,'variables'=>$variables,'users'=>$users]);
    }

    public function update(Request $request, $id){
        
    }

    private function createMap($latitud,$longitud){
        $config = array();
        $config['center'] = sprintf("%f,%f", $latitud,$longitud);
        $config['map_width'] = 'auto';
        $config['map_height'] = 200;
        $config['zoom'] = 15;
        $config['onboundschanged'] = 'if (!centreGot) {
            var mapCentre = map.getCenter();
            marker_0.setOptions({
                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
 
            });
        }
        centreGot = true;';
 
        \Gmaps::initialize($config);
 
        // Colocar el marcador 
        // Una vez se conozca la posición del usuario
        $marker = array();
        \Gmaps::add_marker($marker);

        $map = \Gmaps::create_map();
        return $map;
    }

    public function graficas($id){
        return view('invernaderos.extras.graficas');
    }

    public function tareas($id){
        $tareas = Tarea::select('nombre','descripcion','realizada','created_at')->where(
            'invernadero','=',$id)->orderBy('created_at','desc')->paginate(5);
        return view('invernaderos.extras.tareas',['tareas'=>$tareas]);
    }
}
