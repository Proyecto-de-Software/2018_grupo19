@extends('layouts.show')

@section('title')
    {{ $consulta->paciente->apellido . ', ' . $consulta->paciente->nombre . ' en ' . $consulta->fecha}}
@endsection

@section('edit-action')
    {{ url('consultas/'.$consulta->id.'/edit') }}
@endsection

@section('delete-action')
    {{ url('consultas/'.$consulta->id) }}
@endsection

@section('fields')
    <p>Articulacion con instituciones: {{ $consulta->articulacion_con_instituciones }}</p>
    @if ($consulta->internacion)
        <p>Se requirio internacion.</p>
    @endif
    <p>Diagnostico: {{ $consulta->diagnostico }}</p>
    <p>Observaciones: {{ $consulta->observaciones }}</p>
    <p>Motivo: {{ $consulta->motivo_consulta->nombre }}</p>
    <p>Derivacion: {{ $consulta->derivacion->nombre }}</p>
    <p>Tratamiento farmacologico: {{ $consulta->tratamiento_farmacologico->nombre }}</p>
    <p>Acompanamiento: {{ $consulta->acompanamiento->nombre }}</p>
@endsection
