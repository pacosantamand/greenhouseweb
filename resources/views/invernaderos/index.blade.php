@extends('layouts.app')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="box box-default">
                <div class="box-header">
                    <div class="row">
                        <div class="col col-xs-6">
                            <h3 class="box-title">Lista de Invernaderos</h3>
                        </div>
                        <div class="col col-xs-6 text-right">
                             <a class="btn btn-primary" href="{{route('invernaderos.create')}}">Registrar invernadero</a>
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
                                <th></th>
                                {{-- <th></th> --}}
                            </thead>
                            <tbody>
                                @foreach($invernaderos as $invernadero)
                                    <tr>
                                        <td>{{$invernadero->id}}</td>
                                        <td>{{$invernadero->nombre}}</td>
                                        <td>
                                            <div>
                                            <a class="btn btn-default btn-sm" href="{{route('invernaderos.show',['id'=> $invernadero->id])}}"><em class="fa fa-eye"></em></a>
                                            <a class="btn btn-default btn-sm" href="{{route('invernaderos.edit',['id' => $invernadero->id])}}"><em class="fa fa-pencil"></em></a>
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
                        {!! $invernaderos->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection