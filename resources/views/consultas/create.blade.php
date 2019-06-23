@extends('layouts.form')

@section('title')
    @if (isset($consulta))
        Editar Consulta
    @else
        Nueva Consulta
    @endif
@endsection

@section('js')
    <script src="{{ asset('/js/consulta_form.js') }}" type="module"></script>
@endsection

@section('action')
    @if (isset($consulta))
        {{ url('consultas/'.$consulta->id)}}
    @else
        {{ url('consultas')}}
    @endif
@endsection

@section('cancel-action')
    @if (isset($consulta))
        {{ url('consultas/'.$consulta->id)}}
    @else
        {{ url('consultas/')}}
    @endif
@endsection

@section('form-fields')
    @if (isset($consulta))
        {{ method_field('PUT') }}
    @endif
    <div class="form-group">
        <label for="consulta-fecha" class="col-sm-3 control-label">Fecha</label>
        <div class="col-sm-6">
            <input type="date" name="fecha" id="consulta-fecha" class="form-control" required
            @if (isset($consulta))
                value="{{$consulta->fecha}}"
            @else
                value="{{ old('fecha') }}"
            @endif>
        </div>
    </div>
    <div class="form-group">
        <label for="consulta-articulacion-con-instituciones" class="col-sm-3 control-label">Articulacion con instituciones</label>
        <div class="col-sm-6">
            <input type="text" name="articulacion_con_instituciones" id="consulta-articulacion-con-instituciones" class="form-control" required
            @if (isset($consulta))
                value="{{$consulta->articulacion_con_instituciones}}"
            @else
                value="{{ old('articulacion_con_instituciones') }}"
            @endif>
        </div>
    </div>
    <div class="form-group">
        <label for="consulta-internacion" class="col-sm-3 control-label">Internacion</label>
        <div class="col-sm-6">
            <input type="checkbox" name="internacion" id="consulta-internacion" class="form-check-input" value="1"
            @if (isset($consulta))
                @if ($consulta->internacion)
                    checked
                @endif
            @endif>
        </div>
    </div>
    <div class="form-group">
        <label for="consulta-diagnostico" class="col-sm-3 control-label">Diagnostico</label>
        <div class="col-sm-6">
            <input type="text" name="diagnostico" id="consulta-diagnostico" class="form-control" required
            @if (isset($consulta))
                value="{{$consulta->diagnostico}}"
            @else
                value="{{ old('diagnostico') }}"
            @endif>
        </div>
    </div>
    <div class="form-group">
        <label for="consulta-observaciones" class="col-sm-3 control-label">Observaciones</label>
        <div class="col-sm-6">
            <input type="text" name="observaciones" id="consulta-observaciones" class="form-control" required
            @if (isset($consulta))
                value="{{$consulta->observaciones}}"
            @else
                value="{{ old('observaciones') }}"
            @endif>
        </div>
    </div>
    <div class="form-group">
        <label for="consulta-paciente-id" class="col-sm-3 control-label">Paciente</label>
        <div class="col-sm-6">
            <input type="text" name="paciente_id" id="consulta-paciente-id" class="form-control" required readonly
            @if (isset($consulta))
                value="{{$consulta->paciente_id}}"
            @else
                value="{{ $paciente_id }}"
            @endif>
        </div>
    </div>
    <div class="form-group">
        <label for="consulta-motivo" class="col-sm-3 control-label">Motivo</label>
        <div class="col-sm-6">
            <select name="motivo_consulta_id" id="consulta-motivo" class="form-control" required>
                @foreach ($motivos_consultas as $motivo)
                    <option value={{$motivo->id}}
                    @if (isset($consulta))
                        @if ($motivo->id == $consulta->motivo_consulta_id)
                            selected
                        @endif  
                    @endif>{{$motivo->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="consulta-derivacion" class="col-sm-3 control-label">Derivacion</label>
        <div class="col-sm-6">
            <select name="derivacion_id" id="consulta-derivacion" class="form-control" required></select>
            <div id="consulta-derivacion-default" hidden>
                @if (isset($consulta))
                    {{$consulta->derivacion_id}}
                @else
                    {{ old('derivacion_id') }}
                @endif
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="consulta-tratamiento-farmacologico" class="col-sm-3 control-label">Tratamiento</label>
        <div class="col-sm-6">
            <select name="tratamiento_farmacologico_id" id="consulta-tratamiento-farmacologico" class="form-control" required>
                @foreach ($tratamientos as $tratamiento)
                    <option value={{$tratamiento->id}}
                    @if (isset($consulta))
                        @if ($tratamiento->id == $consulta->tratamiento_farmacologico_id)
                            selected
                        @endif  
                    @endif>{{$tratamiento->nombre}}</option>
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
                    @if (isset($consulta))
                        @if ($acompanamiento->id == $consulta->acompanamiento_id)
                            selected
                        @endif  
                    @endif>{{$acompanamiento->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
@endsection
