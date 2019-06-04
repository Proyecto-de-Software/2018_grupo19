@extends('layouts.form')

@section('title')
    Cargar Paciente N.N.
@endsection

@section('action')
    {{ url('pacientes/nn')}}
@endsection

@section('cancel-action')
    {{ url('pacientes/') }}
@endsection

@section('form-fields')
    <div class="form-group">
        <label for="paciente-nro-historia-clinica" class="col-sm-3 control-label">Historia clinica</label>
        <div class="col-sm-6">
            <input type="text" name="nro_historia_clinica" id="paciente-nro-historia-clinica" class="form-control" required value="{{ old('nro_historia_clinica') }}">
        </div>
    </div>
    <div class="form-group">
        <label for="paciente-nro-carpeta" class="col-sm-3 control-label">Numero de carpeta</label>
        <div class="col-sm-6">
            <input type="text" name="nro_carpeta" id="paciente-nro-carpeta" class="form-control" required value="{{ old('nro_carpeta') }}">
        </div>
    </div>
@endsection