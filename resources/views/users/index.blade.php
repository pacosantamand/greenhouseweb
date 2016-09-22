@extends('layouts.app')

@section('htmlheader_title')
    Usuarios
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="box box-default">
                <div class="box-header">
                    <div class="row">
                        <div class="col col-md-6">
                            <h3 class="box-title">Lista de Usuarios</h3>
                        </div>
                        <div class="col col-md-6 text-right">
                             <a class="btn btn-primary" href="{{route('users.create')}}">Registrar usuario</a>
                        </div>
                    </div> 
                </div>
                <div class="box-body">
                     @if(Session::has('mensaje'))
                        <div class="alert alert-success" role="alert" >
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                            </button>
                            <p> {{Session::get('mensaje')}}</p>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->tipo}}</td>
                                        <td>
                                            <div>
                                            <a class="btn btn-default btn-sm" href="{{route('users.show',['id'=> $user->id])}}"><em class="fa fa-eye"></em></a>
                                            <a class="btn btn-default btn-sm" href="{{route('users.edit',['id' => $user->id])}}"><em class="fa fa-pencil"></em></a>
                                            <a class="btn btn-danger btn-sm"><em class="fa fa-trash"></em></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                            
                    </div>
                </div>
                <div class="box-footer clarfix">
                    <div class="pull-left">
                        {!! $users->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection