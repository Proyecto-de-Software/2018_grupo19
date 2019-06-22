@extends('layouts.form')

@section('title')
    Configuracion
@endsection

@section('action')
    {{ url('config/update') }}
@endsection

@section('cancel-action')
    {{ url('/') }}
@endsection

@section('form-fields')
    {{ method_field('PUT') }}
    <div class="form-group">
        <label for="config-{{$titulo->variable}}" class="col-sm-3 control-label">{{$titulo->variable}}</label>
        <div class="col-sm-6">
            <input type="text" name="{{$titulo->variable}}" id="config-{{$titulo->variable}}" class="form-control" value="{{$titulo->valor}}" required autofocus>
        </div>
    </div>
    <div class="form-group">
        <label for="config-{{$mail->variable}}" class="col-sm-3 control-label">{{$mail->variable}}</label>
        <div class="col-sm-6">
            <input type="text" name="{{$mail->variable}}" id="config-{{$mail->variable}}" class="form-control" value="{{$mail->valor}}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="config-{{$descripcion->variable}}" class="col-sm-3 control-label">{{$descripcion->variable}}</label>
        <div class="col-sm-6">
            <input type="text" name="{{$descripcion->variable}}" id="config-{{$descripcion->variable}}" class="form-control" value="{{$descripcion->valor}}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="config-{{$cantidad_por_pag->variable}}" class="col-sm-3 control-label">{{$cantidad_por_pag->variable}}</label>
        <div class="col-sm-6">
            <input type="number" name="{{$cantidad_por_pag->variable}}" id="config-{{$cantidad_por_pag->variable}}" class="form-control" value="{{$cantidad_por_pag->valor}}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="config-{{$estado_del_sitio->variable}}" class="col-sm-3 control-label">Sitio Habilitado</label>
        <div class="col-sm-6">
            <input type="checkbox" name="{{$estado_del_sitio->variable}}" id="config-{{$estado_del_sitio->variable}}" class="form-check-input"
                @if ($estado_del_sitio->valor == 1)
                    checked
                @endif
            >
        </div>
    </div>
@endsection
