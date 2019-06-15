@extends('layouts.app')

@section('title')
    {{$paciente->nombre . ' ' . $paciente->apellido}}
@endsection

@section('js')
<script src="https://www.openlayers.org/api/OpenLayers.js"></script>
<script src="{{ asset('/js/openStreetMap.js') }}"></script>
@endsection

@section('content')

<div class="d-flex align-items-center">
    <div>Flex item 1</div>
    <div>Flex item 2</div>
    <div>Flex item 3</div>
    <div style="width: 400; height: 400; display: block;"></div>
</div>


        <div class="panel panel-default">
            <div class="panel-heading">
                @yield('title')
            </div>
            
            <div class="panel-body">
                <div id="mapdiv" >Asdas</div>
                <!-- Display Validation Errors -->
                @include('common.errors')
            </div>
        </div>

@endsection