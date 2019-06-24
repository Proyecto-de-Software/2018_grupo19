@extends('layouts.app')

@section('js')
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
<script src="{{ asset('/js/reportes.js') }}"></script>
@endsection

@section('content')

<div id="chart-motivo"></div>
@donutchart('motivo', 'chart-motivo')

<div id="chart-genero"></div>
@donutchart('genero', 'chart-genero')

<div id="chart-localidad"></div>
@donutchart('localidad', 'chart-localidad')

<div id="chart-motivo-png" style="display:none"></div>
@donutchart('motivo_png', 'chart-motivo-png')

<div id="chart-genero-png" style="display:none"></div>
@donutchart('genero_png', 'chart-genero-png')

<div id="chart-localidad-png" style="display:none"></div>
@donutchart('localidad_png', 'chart-localidad-png')

<button class="btn btn-primary" onclick="exportToPdf()">Exportar a PDF</button>

@endsection
