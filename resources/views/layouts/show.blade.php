@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>@yield('title')</h3>
                </div>

                <div class="panel-body">
                    @yield('fields')

                    <!-- Boton editar -->
                    <a class="btn btn-primary" role="button" href="@yield('edit-action')">
                        Editar
                    </a>

                    <!-- Boton eliminar -->
                    <form action="@yield('delete-action')" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-btn fa-trash"></i>Eliminar 
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection