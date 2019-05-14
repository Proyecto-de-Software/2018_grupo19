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

                    <!-- New Task Form -->
                    <form action="{{ url('paciente/all')}}" method="GET" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="filtro-nombre" class="col-sm-3 control-label">Nombre</label>
                            <div class="col-sm-6">
                                <input type="text" name="nombre" id="filtro-nombre" class="form-control">
                            </div>
                        </div>

                        <!-- Add Task Button -->
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
            @if (count($pacientes) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Listado de pacientes
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Paciente</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($pacientes as $paciente)
                                    <tr>
                                        <td class="table-text"><div>{{ $paciente->nombre . ' ' . $paciente->apellido }}</div></td>

                                        <!-- Boton eliminar -->
                                        <td>
                                            <form action="{{ url('paciente/'.$paciente->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection