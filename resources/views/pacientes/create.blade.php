@extends('layouts.form')

@section('title')
    @if (isset($paciente))
        Editar Paciente
    @else
        Nuevo Paciente
    @endif
@endsection

@section('js')
    <script src="{{ asset('/js/paciente_form.js') }}" type="module"></script>
@endsection

@section('action')
    @if (isset($paciente))
        {{ url('pacientes/'.$paciente->id) }}
    @else
        {{ url('pacientes')}}
    @endif
@endsection

@section('cancel-action')
    @if (isset($paciente))
        {{ url('pacientes/'.$paciente->id) }}
    @else
        {{ url('pacientes/') }}
    @endif
@endsection

@section('form-fields')
    @if (isset($paciente))
        {{ method_field('PUT') }}
    @endif
    <div class="form-group">
        <label for="paciente-nombre" class="col-sm-3 control-label">Nombre</label>
        <div class="col-sm-6">
            <input type="text" name="nombre" id="paciente-nombre" class="form-control" required autofocus
            @if (isset($paciente))
                value="{{$paciente->nombre}}"
            @endif>
        </div>
    </div>
    <div class="form-group">
        <label for="paciente-apellido" class="col-sm-3 control-label">Apellido</label>
        <div class="col-sm-6">
            <input type="text" name="apellido" id="paciente-apellido" class="form-control" required
            @if (isset($paciente))
                value="{{$paciente->apellido}}"
            @endif>
        </div>
    </div>
    <div class="form-group">
        <label for="paciente-fecha-nac" class="col-sm-3 control-label">Fecha de nacimiento</label>
        <div class="col-sm-6">
            <input type="date" name="fecha_nac" id="paciente-fecha-nac" class="form-control" required
            @if (isset($paciente))
                value="{{$paciente->fecha_nac}}"
            @endif>
        </div>
    </div>
    <div class="form-group">
        <label for="paciente-lugar-nac" class="col-sm-3 control-label">Lugar de nacimiento</label>
        <div class="col-sm-6">
            <input type="text" name="lugar_nac" id="paciente-lugar-nac" class="form-control" required
            @if (isset($paciente))
                value="{{$paciente->lugar_nac}}"
            @endif>
        </div>
    </div>
    <div class="form-group">
        <label for="paciente-partido" class="col-sm-3 control-label">Partido</label>
        <div class="col-sm-6">
            <select name="partido" id="paciente-partido" class="form-control" required></select>
        </div>
        @if (isset($paciente))
            <div id="paciente-partido-default" hidden>{{$paciente->localidad->partido->id}}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="paciente-region-sanitaria" class="col-sm-3 control-label">Region sanitaria</label>
        <div class="col-sm-6">
            <input name="region_sanitaria" id="paciente-region-sanitaria" class="form-control" required readonly
            @if (isset($paciente))
                value="{{$paciente->region_sanitaria_id}}"
            @endif>
        </div>
    </div>
    <div class="form-group">
        <label for="paciente-localidad" class="col-sm-3 control-label">Localidad</label>
        <div class="col-sm-6">
            <select name="localidad" id="paciente-localidad" class="form-control" required></select>
        </div>
        @if (isset($paciente))
            <div id="paciente-localidad-default" hidden>{{$paciente->localidad_id}}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="paciente-domicilio" class="col-sm-3 control-label">Domicilio</label>
        <div class="col-sm-6">
            <input type="text" name="domicilio" id="paciente-domicilio" class="form-control" required
            @if (isset($paciente))
                value="{{$paciente->region_sanitaria_id}}"
            @endif>
        </div>
    </div>
    <div class="form-group">
        <label for="paciente-genero" class="col-sm-3 control-label">Genero</label>
        <div class="col-sm-6">
            <select name="genero" id="paciente-genero" class="form-control" required>
                @foreach ($generos as $genero)
                    <option value={{$genero->id}}
                    @if (isset($paciente))
                        @if ($genero->id == $paciente->genero_id)
                            selected
                        @endif  
                    @endif>{{$genero->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="paciente-tiene-documento" class="col-sm-3 control-label">Posee documento</label>
        <div class="col-sm-6">
            <input type="checkbox" name="tiene_documento" id="paciente-tiene-documento" class="form-check-input" value="1"
            @if (isset($paciente))
                @if ($paciente->tiene_documento)
                    checked
                @endif
            @endif>
        </div>
    </div>
    <div class="form-group">
        <label for="paciente-tipo-documento" class="col-sm-3 control-label">Tipo documento</label>
        <div class="col-sm-6">
            <select name="tipo_documento" id="paciente-tipo-documento" class="form-control" required>
            </select>
        </div>
        @if (isset($paciente))
            <div id="paciente-tipo-documento-default" hidden>{{$paciente->tipo_doc_id}}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="paciente-documento" class="col-sm-3 control-label">Documento</label>
        <div class="col-sm-6">
            <input type="text" name="documento" id="paciente-documento" class="form-control" required
            @if (isset($paciente))
                value="{{$paciente->documento}}"
            @endif>
        </div>
    </div>
    <div class="form-group">
        <label for="paciente-nro-historia-clinica" class="col-sm-3 control-label">Historia clinica</label>
        <div class="col-sm-6">
            <input type="text" name="nro_historia_clinica" id="paciente-nro-historia-clinica" class="form-control" required
            @if (isset($paciente))
                value="{{$paciente->nro_historia_clinica}}"
            @endif>
        </div>
    </div>
    <div class="form-group">
        <label for="paciente-nro-carpeta" class="col-sm-3 control-label">Numero de carpeta</label>
        <div class="col-sm-6">
            <input type="text" name="nro_carpeta" id="paciente-nro-carpeta" class="form-control" required
            @if (isset($paciente))
                value="{{$paciente->nro_carpeta}}"
            @endif>
        </div>
    </div>
    <div class="form-group">
        <label for="paciente-telefono" class="col-sm-3 control-label">Telefono</label>
        <div class="col-sm-6">
            <input type="text" name="telefono" id="paciente-telefono" class="form-control" required
            @if (isset($paciente))
                value="{{$paciente->telefono}}"
            @endif>
        </div>
    </div>
    <div class="form-group">
        <label for="paciente-obra-social" class="col-sm-3 control-label">Obra social</label>
        <div class="col-sm-6">
            <select name="obra_social" id="paciente-obra-social" class="form-control" required>
            </select>
        </div>
        @if (isset($paciente))
            <div id="paciente-obra-social-default" hidden>{{$paciente->obra_social_id}}</div>
        @endif
    </div>
@endsection
