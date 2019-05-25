@extends('layouts.form')

@section('title')
    @if (isset($user))
    Editar usuario
    @else
    Nuevo usuario
    @endif
@endsection

@section('action')
    @if (isset($user))
        {{ url('users/'.$user->id) }}
    @else
        {{ url('users')}}
    @endif
@endsection

@section('cancel-action')
    {{ url('users/') }}
@endsection

@section('form-fields')
    @if (isset($user))
        {{ method_field('PUT') }}
    @endif
    <div class="form-group">
        <label for="user-name" class="col-sm-3 control-label">Nombre de usuario</label>
        <div class="col-sm-6">
            <input type="text" name="name" id="user-name" class="form-control" required autofocus 
            @if (isset($user))
                value="{{$user->name}}"
            @endif>
        </div>
    </div>
    @if (!isset($user))
        <div class="form-group">
            <label for="paciente-password" class="col-sm-3 control-label">Contrasena</label>
            <div class="col-sm-6">
                <input type="password" name="password" id="paciente-password" class="form-control" required>
            </div>
        </div>
    @endif
    <div class="form-group">
        <label for="paciente-email" class="col-sm-3 control-label">Mail</label>
        <div class="col-sm-6">
            <input type="text" name="email" id="paciente-email" class="form-control" required
            @if (isset($user))
                value="{{$user->email}}"
            @endif>
        </div>
    </div>
    <div class="form-group">
        <label for="user-nombre" class="col-sm-3 control-label">Nombre</label>
        <div class="col-sm-6">
            <input type="text" name="nombre" id="user-nombre" class="form-control" required
            @if (isset($user))
                value="{{$user->nombre}}"
            @endif>
        </div>
    </div>
    <div class="form-group">
        <label for="user-apellido" class="col-sm-3 control-label">Apellido</label>
        <div class="col-sm-6">
            <input type="text" name="apellido" id="user-apellido" class="form-control" required
            @if (isset($user))
                value="{{$user->apellido}}"
            @endif>
        </div>
    </div>
    <div class="form-group">
        <label for="paciente-activo" class="col-sm-3 control-label">Activo</label>
        <div class="col-sm-6">
            <input type="checkbox" name="activo" id="paciente-activo" class="form-check-input" value="1"
            @if (isset($user))
                @if ($user->activo)
                    checked
                @endif
            @endif>
        </div>
    </div>
@endsection
