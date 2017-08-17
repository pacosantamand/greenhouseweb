@extends('layouts.app')

@section('htmlheader_title')
    Invernaderos - Tareas
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="box box-default">
                <div class="box-header">
                    <h3 class="box-title">Línea de Tiempo</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                        <ul class="timeline">
                        @foreach($tareas as $tarea)
                            <!-- timeline time label -->
                            <li class="time-label">
                                  <span class="bg-blue">
                                    {{$tarea->created_at->format('d/m/Y')}}
                                  </span>
                            </li>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <li>
                                @if($tarea->realizada == 1)
                                     <i class="fa fa-check bg-green"></i>
                                @else
                                     <i class="fa fa- fa-exclamation bg-red"></i>
                                @endif
                             

                              <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> {{$tarea->created_at->format('H:i')}}</span>

                                <h3 class="timeline-header">{{$tarea->nombre}}</h3>

                                <div class="timeline-body">
                                    {{$tarea->descripcion}}
                                </div>
                              </div>
                            </li>
                            @endforeach
                        </ul>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="pull-left">
                        {!! $tareas->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
