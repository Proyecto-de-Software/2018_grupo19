@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
            @section('search')
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Filtrar</h4>
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- Formulario de busqueda -->
                    <form action="{{ url($title)}}" method="GET" class="form-horizontal">
                        {{ csrf_field() }}
                        <input type="hidden" value="on" name="search">

                        @yield('campos_form_busqueda')

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus">Aplicar filtros</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @show

            <!-- Listado -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="container">
                        <div class="row align-items-start">
                            <div class="col-sm-5">
                                <h4>Listado de {{$title}}</h4>
                            </div>
                            <div class="col-sm-3">
                                @yield('boton_listado_completo')
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>{{ucfirst($title)}}</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @yield('item-list')
                        </tbody>
                    </table>
                    @yield('pagination')
                    <!-- Boton Nuevo -->
                    <form action="{{ url($title."/create")}}">
                        {{ csrf_field() }}

                        <button type="submit" class="btn">
                            <i class="fa fa-btn fa-trash"></i>Agregar {{substr($title,0,-1)}}
                        </button>
                    </form>
                    @yield('extra_buttons')
                </div>
            </div>
        </div>
    </div>
@endsection
