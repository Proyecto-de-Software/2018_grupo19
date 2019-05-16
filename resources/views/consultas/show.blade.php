@extends('layouts.show')

@section('title')
    {{$consulta->paciente_id . ' en ' . $consulta->fecha}}
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
        Se requirio internacion.
    @endif
    <p>Diagnostico: {{ $consulta->diagnostico }}</p>
    <p>Observaciones: {{ $consulta->observaciones }}</p>
    <p>Motivo: {{ $consulta->motivo_id }}</p>
    <p>Derivacion: {{ $consulta->derivacion_id }}</p>
    <p>Tratamiento farmacologico: {{ $consulta->tratamiento_farmacologico_id }}</p>
    <p>Acompanamiento: {{ $consulta->acompanamiento_id }}</p>
@endsection
