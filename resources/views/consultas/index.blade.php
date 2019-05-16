@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Filtrar
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- Formulario de busqueda -->
                    <form action="{{ url('consultas')}}" method="GET" class="form-horizontal">
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

            <!-- Listado -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Listado de consultas
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>Consulta</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach ($consultas as $consulta)
                                <tr>
                                    <td class="table-text"><div>{{ $consulta->paciente->apellido . ', ' . $consulta->paciente->nombre . ' el ' . $consulta->fecha }}</div></td>
                                    <td>
                                        <!-- Boton mas info -->
                                        <form action="{{ url('consultas/'.$consulta->id) }}">
                                            {{ csrf_field() }}

                                            <button type="submit" class="btn">
                                                <i class="fa fa-btn fa-trash"></i>Mas info 
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Boton Nuevo consulta -->
                    <form action="{{ url('consultas/create') }}">
                        {{ csrf_field() }}

                        <button type="submit" class="btn">
                            <i class="fa fa-btn fa-trash"></i>Nueva consulta 
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection