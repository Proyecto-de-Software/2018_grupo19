@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Nuevo paciente
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- Formulario de creacion de paciente -->
                    <form action="{{ url('paciente')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="paciente-nombre" class="col-sm-3 control-label">Nombre</label>
                            <div class="col-sm-6">
                                <input type="text" name="nombre" id="paciente-nombre" class="form-control" value="{{ old('task') }}">
                            </div>
                        </div>

                        <!-- Guardar -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection