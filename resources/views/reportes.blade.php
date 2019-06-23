@extends('layouts.app')

@section('content')

<div id="chart-motivo"></div>
@donutchart('motivo', 'chart-motivo')

<div id="chart-genero"></div>
@donutchart('genero', 'chart-genero')

<div id="chart-localidad"></div>
@donutchart('localidad', 'chart-localidad')

@endsection