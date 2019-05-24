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

                        <div class="form-group">
                            <label for="filtro-nombre" class="col-sm-3 control-label">Nombre</label>
                            <div class="col-sm-6">
                                <input type="text" name="nombre" id="filtro-nombre" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Aplicar filtros
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
                    <h4>Listado de {{$title}}</h4>
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
                </div>
            </div>
        </div>
    </div>
@endsection