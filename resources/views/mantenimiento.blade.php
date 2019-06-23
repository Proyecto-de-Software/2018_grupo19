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

        @guest
            <p>
                Comuniquese con el administrador
            </p>
            <div>
                <a href="{{ route('login') }}">
                    <button class="btn btn-primary">
                        Iniciar Sesion
                    </button>
                </a>
            </div>
        @endguest
        @auth
            @can('config_index')
                <a href="{{ url('config/edit') }}">
                    <button class="btn btn-primary">
                        Ir a la configuracion
                    </button>
                </a>
            @else
                <p>Usted no tiene permisos para hacer nada en este momento</p>
            @endcan

                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    <button class="btn btn-primary">
                        Cerrar sesion
                    </button>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
        @endauth
    </div>
@endsection
