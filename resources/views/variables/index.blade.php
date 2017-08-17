@extends('layouts.app')

@section('htmlheader_title')
    Variables
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="box box-default">
                <div class="box-header">
                    <div class="row">
                        <div class="col col-md-6">
                            <h3 class="box-title">Lista de Variables</h3>
                        </div>
                        <div class="col col-md-6 text-right">
                             <a class="btn btn-primary" href="{{route('variables.create')}}">Registrar variable</a>
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
                                <th>Unidad de Medida</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach($variables as $variable)
                                    <tr>
                                        <td>{{$variable->id}}</td>
                                        <td>{{$variable->nombre}}</td>
                                        <td>{{$variable->unidad_de_medida}}</td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#{{$variable->nombre}}">
                                              <em class="fa fa-eye"></em>
                                            </button>

                                            {{-- <a class="btn btn-default btn-sm" href="{{route('variables.show',['id'=> $variable->id])}}"><em class="fa fa-eye"></em></a> --}}
                                            <a class="btn btn-default btn-sm" href="{{route('variables.edit',['id' => $variable->id])}}"><em class="fa fa-pencil"></em></a>
                                            <a class="btn btn-danger btn-sm"><em class="fa fa-trash"></em></a>
                                        </td>
                                        <div class="modal fade" id="{{$variable->nombre}}" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Variables</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><strong>Nombre:</strong> {{$variable->nombre}}</p>

                                                        {{-- <br /> --}}
                                                        <p><strong>Unidad de medida: </strong>{{$variable->unidad_de_medida}}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-footer clarfix">
                    <div class="pull-left">
                        {!! $variables->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection