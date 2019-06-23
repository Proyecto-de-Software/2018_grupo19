@extends('layouts.app')

@section('js')
@mapstyles
@mapscripts
@endsection

@section('title')
Últimas derivaciones de <a href="{{url("pacientes/$paciente->id")}}">{{$paciente->nombre . ' ' . $paciente->apellido}}</a>
@endsection

@section('content')

        <div class="panel panel-default">
            <div class="panel-heading text-center">
                @yield('title')
            </div>
            <div class="center">
            @map([
                'lat' => empty($markers)?'-34.9238':$markers[0]['lat'],
                'lng' => empty($markers)?'-57.9475':$markers[0]['lng'],
                'zoom' => '14',
                'markers' => $markers,
            ])
            </div>
        </div>

@endsection