@extends('layouts.show')

@section('title')
    {{$user->name}}
@endsection

@section('edit-action')
    {{ url('users/'.$user->id.'/edit') }}
@endsection

@section('delete-action')
    {{ url('users/'.$user->id) }}
@endsection

@section('fields')
    <p>Mail: {{ $user->email }}</p>
    <p>Nombre completo: {{ $user->nombre }} {{ $user->apellido }}</p>
    <p>Se encuentra {{ $user->activo ? 'activo' : 'inactivo' }}</p>
@endsection
