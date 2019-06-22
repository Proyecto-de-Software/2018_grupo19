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
    <div class="row">
        <label class="col-sm-1 control-label">Roles:</label>
        <div class="col-sm-4">
            @foreach ($roles as $rol)
                <p> {{$rol}} </p>
            @endforeach
        </div>
    </div>
@endsection
