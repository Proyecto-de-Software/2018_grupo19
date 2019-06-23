@extends('layouts.show')

@section('title')
    {{$paciente->nombre . ' ' . $paciente->apellido}}
@endsection

@section('edit-action')
    {{ url('pacientes/'.$paciente->id.'/edit') }}
@endsection

@section('delete-action')
    {{ url('pacientes/'.$paciente->id) }}
@endsection

@section('fields')
<p>Historia Clinica: {{ $paciente->nro_historia_clinica }}</p>
<p>Nro. carpeta: {{ $paciente->nro_carpeta }}</p>
@if (!$paciente->nn)
    <p>Fecha de nacimiento: {{ $paciente->fecha_nac }}</p>
    <p>Lugar de nacimiento: {{ $paciente->lugar_nac }}</p>
    <p>Region sanitaria: {{ $paciente->region_sanitaria->nombre }}</p>
    <p>Localidad: {{ $paciente->localidad->nombre }}</p>
    <p>Domicilio: {{ $paciente->domicilio }}</p>
    <p>Genero: {{ $paciente->genero->nombre }}</p>
    @if ($paciente->tiene_documento)
        <p>{{ $paciente->tipo_doc->nombre }} : {{ $paciente->documento }}</p>
    @endif
    <p>Telefono: {{ $paciente->telefono }}</p>
    <p>Obra social: {{ $paciente->obra_social->nombre }}</p>
    <a href="{{ url('pacientes/derivaciones/'.$paciente->id) }}" class="btn btn-info" role="button">Últimas derivaciones</a>
@endif
<a class="btn btn-primary" role="button" href="{{ url("consultas/create/".$paciente->id)}}">
    Agregar consulta
</a>
@endsection

