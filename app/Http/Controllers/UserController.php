<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$users = User::paginate(10);
    	return view('users.index',['users'=>$users]);
    }

    public function create(){
    	return view('users.create');
    }

    public function store(UserRequest $request){
	    // User::create($request->all());
	    $user = new User();
	    $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->tipo = $request->get('tipo');
        $user->password = bcrypt($request->get('password'));
        $user->save();
    	return redirect('users')->with(['mensaje'=>'Usuario creado correctamente']);
    }

    public function show($id){
    	$user = User::find($id);
    	return view('users.show',['user'=>$user]);
    }

    public function edit($id){
    	$user = User::find($id);
    	return view('users.edit',['user'=>$user]);
    }
}
