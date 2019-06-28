@extends('layouts.form')

@section('title')
    @if (isset($institucion))
    Editar Institución
    @else
    Nueva Institución
    @endif
@endsection

@section('action')
    @if (isset($institucion))
    {{ url('instituciones/'.$institucion->id) }}
    @else
    {{ url('instituciones')}}
@endif
@endsection

@section('cancel-action')
        {{ url('listadoInstituciones')}}
@endsection

@section('form-fields')
    @if (isset($institucion))
    {{ method_field('PUT') }}
    @endif
    <div class="form-group">
        <label for="institucion-nombre" class="col-sm-3 control-label">Nombre</label>
        <div class="col-sm-6">
            <input type="text" name="nombre" id="institucion-fecha" class="form-control" required
            @if (isset($institucion))
                value="{{$institucion->nombre}}"
            @else
                value="{{ old('nombre') }}"
            @endif>
        </div>
    </div>
    <div class="form-group">
        <label for="institucion-director" class="col-sm-3 control-label">Director</label>
        <div class="col-sm-6">
            <input type="text" name="director" id="institucion-director" class="form-control" required
            @if (isset($institucion))
                value="{{$institucion->director}}"
            @else
                value="{{ old('director') }}"
            @endif>
        </div>
    </div>
    <div class="form-group">
        <label for="institucion-telefono" class="col-sm-3 control-label">Telefono</label>
        <div class="col-sm-6">
            <input type="text" name="telefono" id="institucion-telefono" class="form-control" required
            @if (isset($institucion))
                value="{{$institucion->telefono}}"
            @else
                value="{{ old('telefono') }}"
            @endif>
        </div>
    </div>
    <div class="form-group">
        <label for="institucion-latitud" class="col-sm-3 control-label">Latitud</label>
        <div class="col-sm-6">
            <!--validar con expresión regular latitud-->
            <input type="text" name="latitud" id="institucion-latitud" class="form-control" required
            @if (isset($institucion))
                value="{{$institucion->latitud}}"
            @else
                value="{{ old('latitud') }}"
            @endif>
        </div>
    </div>
    <div class="form-group">
            <label for="institucion-longitud" class="col-sm-3 control-label">Longitud</label>
            <div class="col-sm-6">
                <!--validar con expresión regular longitud-->
                <input type="text" name="longitud" id="institucion-longitud" class="form-control" required
                @if (isset($institucion))
                value="{{$institucion->longitud}}"
            @else
                value="{{ old('longitud') }}"
            @endif>
            </div>
        </div>
    <div class="form-group">
        <label for="institucion-region-sanitaria-id" class="col-sm-3 control-label">Región Sanitaria</label>
        <div class="col-sm-6">
            <select name="region_sanitaria_id" id="institucion-region-sanitaria-id" class="form-control" required>
                @foreach ($regiones as $region)
                    <option value={{$region->id}}
                        @if (isset($institucion))
                            @if ($region->id == $institucion->region_sanitaria_id)
                                selected
                            @endif  
                        @endif>{{$region->nombre}}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="institucion-tipo-institucion-id" class="col-sm-3 control-label">Tipo de institución</label>
        <div class="col-sm-6">
            <select name="tipo_institucion_id" id="institucion-tipo-institucion-id" class="form-control" required>
                @foreach ($tiposInst as $tInst)
                    <option value={{$tInst->id}}
                        @if (isset($institucion))
                            @if ($tInst->id == $institucion->tipo_institucion_id)
                                selected
                            @endif  
                        @endif>{{$tInst->nombre}}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
@endsection
