@extends('layouts.app')

@section('htmlheader_title')
    Invernaderos
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-default">
                <div class="box-header">
                    <h3 class="box-title">Actualizar invernadero</h3>
                </div>
                <div class="box-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{route('invernaderos.update',$invernadero->id) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ $invernadero->nombre }}">

                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                            <label for="descripcion" class="col-md-4 control-label">Descripcion</label>

                            <div class="col-md-6">
                                <textarea id="descripcion" type="text" class="form-control" name="descripcion">{{ $invernadero->descripcion }}</textarea>

                                @if ($errors->has('descripcion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('user') ? ' has-error' : '' }}">
                            <label for="user" class="col-md-4 control-label">Responsable</label>

                            <div class="col-md-6">
                                <select name="user_id" class="form-control">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option> 
                                    @endforeach
                                </select>

                                @if ($errors->has('tipo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tipo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('variables') ? ' has-error' : '' }}">
                            <label for="variables" class="col-md-4 control-label">Variables</label>

                            <div class="col-md-6">
                                <select multiple class="form-control" name="variables[]">
                                    @foreach($variables as $variable)
                                        <option value="{{$variable->id}}">{{$variable->nombre}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('variables'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('variables') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-floppy-o"></i> Actualizar
                                </button>
                                <a class="btn btn-default" href="{{route('invernaderos.index')}}">Regresar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
