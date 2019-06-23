@extends('layouts.app')

@section('js')
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
@endsection

@section('content')

<div id="chart-motivo"></div>
@donutchart('motivo', 'chart-motivo')

<div id="chart-genero"></div>
@donutchart('genero', 'chart-genero')

<div id="chart-localidad"></div>
@donutchart('localidad', 'chart-localidad')

@endsection
