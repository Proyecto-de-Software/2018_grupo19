@extends('layouts.form')

@section('title')
    Editar Paciente
@endsection

@section('action')
    {{ url('pacientes/'.$paciente->id) }}
@endsection

@section('cancel-action')
    {{ url('pacientes/'.$paciente->id) }}
@endsection

@section('form-fields')
    {{ method_field('PUT') }}
    <div class="form-group">
        <label for="paciente-nombre" class="col-sm-3 control-label">Nombre</label>
        <div class="col-sm-6">
            <input type="text" name="nombre" id="paciente-nombre" class="form-control" value="{{$paciente->nombre}}" required autofocus>
        </div>
    </div>
    <div class="form-group">
        <label for="paciente-apellido" class="col-sm-3 control-label">Apellido</label>
        <div class="col-sm-6">
            <input type="text" name="apellido" id="paciente-apellido" class="form-control" value="{{$paciente->apellido}}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="paciente-fecha-nac" class="col-sm-3 control-label">Fecha de nacimiento</label>
        <div class="col-sm-6">
            <input type="date" name="fecha_nac" id="paciente-fecha-nac" class="form-control" value="{{$paciente->fecha_nac}}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="paciente-lugar-nac" class="col-sm-3 control-label">Lugar de nacimiento</label>
        <div class="col-sm-6">
            <input type="text" name="lugar_nac" id="paciente-lugar-nac" class="form-control" value="{{$paciente->lugar_nac}}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="paciente-partido" class="col-sm-3 control-label">Partido</label>
        <div class="col-sm-6">
            <select name="partido" id="paciente-partido" class="form-control" value="{{$paciente->partido_id}}" required>
                <!-- Se deberian cargar con AJAX? -->
                @foreach ($partidos as $partido)
                    <option value={{$partido->id}}
                        @if ($partido->id == $paciente->localidad->partido_id)
                            selected
                        @endif    
                    >{{$partido->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="paciente-region-sanitaria" class="col-sm-3 control-label">Region sanitaria</label>
        <div class="col-sm-6">
            <input name="region_sanitaria" id="paciente-region-sanitaria" class="form-control" value="{{$paciente->region_sanitaria_id}}" required readonly>
            <!-- Cargar con AJAX y deberia ser solo lectura en funcion del partido -->
        </div>
    </div>
    <div class="form-group">
        <label for="paciente-localidad" class="col-sm-3 control-label">Localidad</label>
        <div class="col-sm-6">
            <select name="localidad" id="paciente-localidad" class="form-control" value="{{$paciente->localidad_id}}" required>
                <!-- Cargar con AJAX en funcion de partido -->
                @foreach ($localidades as $localidad)
                    <option value={{$localidad->id}}
                        @if ($localidad->id == $paciente->localidad_id)
                            selected
                        @endif 
                    >{{$localidad->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="paciente-domicilio" class="col-sm-3 control-label">Domicilio</label>
        <div class="col-sm-6">
            <input type="text" name="domicilio" id="paciente-domicilio" class="form-control" value="{{$paciente->domicilio}}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="paciente-genero" class="col-sm-3 control-label">Genero</label>
        <div class="col-sm-6">
            <select name="genero" id="paciente-genero" class="form-control" value="{{$paciente->genero_id}}" required>
                @foreach ($generos as $genero)
                    <option value={{$genero->id}}
                        @if ($genero->id == $paciente->genero_id)
                            selected
                        @endif    
                    >{{$genero->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="paciente-tiene-documento" class="col-sm-3 control-label">Posee documento</label>
        <div class="col-sm-6">
            <input type="checkbox" name="tiene_documento" id="paciente-tiene-documento" class="form-check-input" value="1"
            @if ($paciente->tiene_documento)
                checked
            @endif
            >
        </div>
    </div>
    <div class="form-group">
        <label for="paciente-tipo-documento" class="col-sm-3 control-label">Tipo documento</label>
        <div class="col-sm-6">
            <select name="tipo_documento" id="paciente-tipo-documento" class="form-control" value="{{$paciente->tipo_documento_id}}" required>
                @foreach ($tipos_documento as $tipo_documento)
                    <option value={{$tipo_documento->id}}
                        @if ($tipo_documento->id == $paciente->tipo_doc_id)
                            selected
                        @endif    
                    >{{$tipo_documento->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="paciente-documento" class="col-sm-3 control-label">Documento</label>
        <div class="col-sm-6">
            <input type="text" name="documento" id="paciente-documento" class="form-control" value="{{$paciente->documento}}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="paciente-nro-historia-clinica" class="col-sm-3 control-label">Historia clinica</label>
        <div class="col-sm-6">
            <input type="text" name="nro_historia_clinica" id="paciente-nro-historia-clinica" class="form-control" value="{{$paciente->nro_historia_clinica}}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="paciente-nro-carpeta" class="col-sm-3 control-label">Numero de carpeta</label>
        <div class="col-sm-6">
            <input type="text" name="nro_carpeta" id="paciente-nro-carpeta" class="form-control" value="{{$paciente->nro_carpeta}}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="paciente-telefono" class="col-sm-3 control-label">Telefono</label>
        <div class="col-sm-6">
            <input type="text" name="telefono" id="paciente-telefono" class="form-control" value="{{$paciente->telefono}}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="paciente-obra-social" class="col-sm-3 control-label">Obra social</label>
        <div class="col-sm-6">
            <select name="obra_social" id="paciente-obra-social" class="form-control" value="{{$paciente->obra_social_id}}" required>
                <!-- Se deberian cargar con AJAX -->
                @foreach ($obras_sociales as $obra_social)
                    <option value={{$obra_social->id}}
                        @if ($obra_social->id == $paciente->obra_social_id)
                            selected
                        @endif    
                    >{{$obra_social->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
@endsection