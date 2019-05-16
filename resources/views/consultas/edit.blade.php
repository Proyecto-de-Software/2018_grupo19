@extends('layouts.form')

@section('title')
    Editar Consulta
@endsection

@section('action')
    {{ url('consultas/'.$consulta->id)}}
@endsection

@section('cancel-action')
    {{ url('consultas/'.$consulta->id)}}
@endsection

@section('form-fields')
    {{ method_field('PUT') }}
    <div class="form-group">
        <label for="consulta-fecha" class="col-sm-3 control-label">Fecha</label>
        <div class="col-sm-6">
            <input type="date" name="fecha" id="consulta-fecha" class="form-control" value="{{$consulta->fecha}}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="consulta-articulacion-con-instituciones" class="col-sm-3 control-label">Articulacion con instituciones</label>
        <div class="col-sm-6">
            <input type="text" name="articulacion_con_instituciones" id="consulta-articulacion-con-instituciones" class="form-control" value="{{$consulta->articulacion_con_instituciones}}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="consulta-internacion" class="col-sm-3 control-label">Internacion</label>
        <div class="col-sm-6">
            <input type="checkbox" name="internacion" id="consulta-internacion" class="form-check-input" value="1"
            @if ($consulta->internacion)
                checked
            @endif>
        </div>
    </div>
    <div class="form-group">
        <label for="consulta-diagnostico" class="col-sm-3 control-label">Diagnostico</label>
        <div class="col-sm-6">
            <input type="text" name="diagnostico" id="consulta-diagnostico" class="form-control" value="{{$consulta->diagnostico}}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="consulta-observaciones" class="col-sm-3 control-label">Observaciones</label>
        <div class="col-sm-6">
            <input type="text" name="observaciones" id="consulta-observaciones" class="form-control" value="{{$consulta->observaciones}}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="consulta-paciente-id" class="col-sm-3 control-label">Paciente</label>
        <div class="col-sm-6">
            <input type="text" name="paciente_id" id="consulta-paciente-id" class="form-control" value="{{$consulta->paciente_id}}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="consulta-motivo" class="col-sm-3 control-label">Motivo</label>
        <div class="col-sm-6">
            <select name="motivo_consulta_id" id="consulta-motivo" class="form-control" required>
                <!-- Se deberian cargar con AJAX? -->
                @foreach ($motivos_consultas as $motivo)
                    <option value={{$motivo->id}}
                        @if ($motivo->id == $consulta->motivo_consulta_id)
                            selected
                        @endif
                    >{{$motivo->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="consulta-derivacion" class="col-sm-3 control-label">Derivacion</label>
        <div class="col-sm-6">
            <select name="derivacion_id" id="consulta-derivacion" class="form-control" required>
                <!-- Mirar que onda las instituciones -->
                @foreach ($instituciones as $institucion)
                    <option value={{$institucion->id}}
                        @if ($institucion->id == $consulta->institucion_id)
                            selected
                        @endif
                    >{{$institucion->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="consulta-tratamiento-farmacologico" class="col-sm-3 control-label">Tratamiento</label>
        <div class="col-sm-6">
            <select name="tratamiento_farmacologico_id" id="consulta-tratamiento-farmacologico" class="form-control" required>
                @foreach ($tratamientos as $tratamiento)
                    <option value={{$tratamiento->id}}
                        @if ($tratamiento->id == $consulta->tratamiento_farmacologico_id)
                            selected
                        @endif
                    >{{$tratamiento->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="consulta-acompanamiento" class="col-sm-3 control-label">Acompanamiento</label>
        <div class="col-sm-6">
            <select name="acompanamiento_id" id="consulta-acompanamiento" class="form-control" required>
                @foreach ($acompanamientos as $acompanamiento)
                    <option value={{$acompanamiento->id}}
                        @if ($acompanamiento->id == $consulta->acompanamiento_id)
                            selected
                        @endif
                    >{{$acompanamiento->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
@endsection
