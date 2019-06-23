@extends('layouts.app')

@section('navbar')
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
        </div>
    </nav>
@endsection

@section('content')
<div class="jumbotron col-sm-offset-3 col-sm-6 d-flex justify-content-center" >
        <h2 class="display-3">
            El sitio esta en mantenimiento
        </h2>
        <p>
            Contactese con el administrador
        </p>
        <a href="{{ route('login') }}">
            <button class="btn btn-primary">
                Iniciar Sesion con otro usuario
            </button>
        </a>
</div>
@endsection
