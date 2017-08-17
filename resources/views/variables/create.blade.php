@extends('layouts.app')

@section('htmlheader_title')
    Variables
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-default">
                <div class="box-header">
                    <h3 class="box-title">Registrar variable</h3>
                </div>
                <div class="box-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{route('variables.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">

                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('unidad_de_medida') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label">Unidad de Medida</label>

                            <div class="col-md-6">
                                <input id="unidad_de_medida" type="text" class="form-control" name="unidad_de_medida" value="{{ old('unidad_de_medida') }}">

                                @if ($errors->has('unidad_de_medida'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('unidad_de_medida') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-floppy-o"></i> Registrar
                                </button>
                                <a class="btn btn-default" href="{{route('variables.index')}}">Regresar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
