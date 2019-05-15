@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>{{$paciente->nombre . ' ' . $paciente->apellido}}</h3>
                </div>

                <div class="panel-body">
                    <p>Fecha de nacimiento: {{ $paciente->fecha_nac }}</p>
                    <p>Lugar de nacimiento: {{ $paciente->lugar_nac }}</p>
                    <p>Region sanitaria: {{ $paciente->region_sanitaria_id }}</p>
                    <p>Localidad: {{ $paciente->localidad_id}}</p>
                    <p>Domicilio: {{ $paciente->domicilio}}</p>
                    <p>Genero: {{ $paciente->genero_id}}</p>
                    @if ($paciente->tiene_documento)
                        <p>{{ $paciente->tipo_doc_id}} : {{ $paciente->documento}}</p>
                    @endif
                    <p>Historia Clinica: {{ $paciente->nro_historia_clinica}}</p>
                    <p>Nro. carpeta: {{ $paciente->nro_carpeta}}</p>
                    <p>Telefono: {{ $paciente->telefono}}</p>
                    <p>Obra social: {{ $paciente->obra_social_id}}</p>

                    <!-- Boton editar -->
                    <form action="{{ url('pacientes/'.$paciente->id.'/edit') }}">
                        {{ csrf_field() }}

                        <button type="submit" class="btn">
                            <i class="fa fa-btn fa-trash"></i>Editar 
                        </button>
                    </form>

                    <!-- Boton eliminar -->
                    <form action="{{ url('pacientes/'.$paciente->id) }}" method="POST">
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