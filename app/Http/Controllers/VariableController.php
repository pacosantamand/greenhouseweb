<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\VariableRequest;
use App\Variable;
use Illuminate\Http\Request;

class VariableController extends Controller
{
    public function index(){
    	$variables = Variable::paginate(10);
    	return view('variables.index',['variables'=>$variables]);
    }

    public function create(){
    	return view('variables.create');
    }

    public function store(VariableRequest $request){
    	Variable::create($request->all());
    	return redirect('variables')->with(['mensaje'=>'Variable creada correctamente']);
    }

    public function show($id){
    	$variable = Variable::find($id);
    	//return view('variables.show',['variable'=>$variable]);
    }

    public function edit($id){
    	$variable = Variable::find($id);
    	return view('variables.edit',['variable'=>$variable]);
    }

    public function update(VariableRequest $request,$id){
    	$variable = Variable::find($id);
    	$variable->update($request->all());
    	return redirect('variables')->with(['mensaje'=>'Variable actualizada correctamente']);
    }

 	  public function destroy($id){
 		   $variable = Variable::find($id);
 		    $variable->destroy();
 		     return view('variables.index');
 	  }   
}
