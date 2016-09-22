@extends('layouts.app')

@section('htmlheader_title')
    Usuarios
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Usuario</div>

                <div class="panel-body">
                    {{$user->name}}
                    <br />
                    <a class="btn btn-default" href="{{route('users.index')}}">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
