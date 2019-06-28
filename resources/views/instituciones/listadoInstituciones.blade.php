@extends('layouts.app')

@section('title')
    Listado de instituciones
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/listado-instituciones.css') }}">
@endsection

@section('js')
@endsection

@section('content')
<section id="general" style="margin:20px">
    <h2 class="display-4">Buscador de instituciones</h2>
    <section style="margin:20px;">
            <div class="row form-partidos">
                <div>
                    <p>
                        Seleccione el partido:
                    </p>
                    <select name="partido-select" id="partido-select" v-model="selected" v-on:change="actualizar">
                        <option value="0">Todas</option>
                        <option v-for="p in partidos" v-bind:value="p.id">@{{p.nombre}}</option>
                    </select>
                </div>
                <p>Region sanitaria: @{{regSanitaria}} </p>
                <!-- <button v-on:click="actualizarListado">Buscar >></button> -->
                @can('institucion_new')
                    <a class="btn btn-primary" role="button" href="{{ url("instituciones/create")}}">
                        Agregar Institucion
                    </a>
                @endcan
            </div>
        </section>
        <section>
        <table class="table" id="tabla-instituciones">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>institución</th>
                    <th>Director/a</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="i in instituciones">
                    <td scope="row">@{{i.id}}</td>
                    <td>@{{i.nombre}}</td>
                    <td>@{{i.director}}</td>
                    <td>Desconocida</td>
                    <td>@{{i.telefono}}</td>
                    <td>
                        <a class="btn btn-primary" role="button" v-bind:href="'instituciones/' +  i.id + '/edit'">
                            Editar
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</section>
<script src="{{ asset('/js/listadoInstituciones.js') }}"></script>
@endsection
