<?php

namespace App\Http\Controllers;

use App\Http\Requests;  
use App\Invernadero;
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
        return view('invernaderos.show',['invernadero'=>$invernadero]);
    }

    public function edit($id){
        $invernadero= Invernadero::find($id);
        $variables = Variable::all();
        $users = User::where('tipo', '=', 'agronomo')->get();
        return view('invernaderos.edit',['invernadero'=>$invernadero,'variables'=>$variables,'users'=>$users]);
    }

    public function update(Request $request, $id){
        
    }
}
