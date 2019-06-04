@extends('layouts.index', ['resources' => $pacientes, 'title' => "pacientes"])

@section('campos_form_busqueda')
    <div class="form-group">
        <label for="filtro-nombre" class="col-sm-1 control-label">Nombre</label>
        <div class="col-sm-5">
            <input type="text" name="nombre" id="filtro-username" class="form-control" value="{{app('request')->input('nombre')}}">
        </div>
        <label for="filtro-apellido" class="col-sm-1 control-label">Apellido</label>
        <div class="col-sm-5">
            <input type="text" name="apellido" id="filtro-active" class="form-control" value="{{app('request')->input('apellido')}}">
        </div>
    </div>
    <div class="form-group">
        <label for="filtro-nro-doc" class="col-sm-2 control-label">Numero Doc.</label>
        <div class="col-sm-5">
            <input type="text" name="nro-doc" id="filtro-nro-doc" class="form-control" value="{{app('request')->input('nro-doc')}}">
        </div>
        <label for="filtro-tipo-doc" class="col-sm-2 control-label">Tipo Doc.</label>
        <div class="col-sm-3">
            <select name="tipo-doc" id="filtro-tipo-doc" class="form-control">
                <option value="0" @if (app('request')->input('tipo-doc') == 0)
                        selected
                @endif ></option>
                <option value="1" @if (app('request')->input('tipo-doc') == 1)
                    selected
                @endif>DNI</option>
                <option value="2" @if (app('request')->input('tipo-doc') == 2)
                    selected
                @endif>LC</option>
                <option value="3" @if (app('request')->input('tipo-doc') == 3)
                    selected
                @endif>CI</option>
                <option value="4" @if (app('request')->input('tipo-doc') == 4)
                    selected
                @endif>LE</option>
                <option value="5" @if (app('request')->input('tipo-doc') == 5)
                    selected
                @endif>Pasaporte</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="filtro-historia-clinica" class="col-sm-4 control-label">Numero de Historia Clinica</label>
        <div class="col-sm-7">
            <input type="text" name="historia-clinica" id="filtro-historia-clinica" class="form-control" value="{{app('request')->input('historia-clinica')}}">
        </div>
    </div>
@endsection

@section('boton_listado_completo')
    <a href="{{ url('pacientes') }}"><button class="btn btn-default">
        <i>Todos los pacientes</i>
    </button></a>
@endsection

@section('item-list')
    @foreach ($pacientes as $resource)
        <tr>
            <td class="table-text"><div>{{ $resource->nombre . ' ' . $resource->apellido }}</div></td>
            <td>
                <!-- Boton mas info -->
                <form action="{{ url('pacientes/'.$resource->id) }}">
                    {{ csrf_field() }}

                    <button type="submit" class="btn">
                        <i class="fa fa-btn fa-trash"></i>Mas info
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
@endsection

@section('extra_buttons')
    <!-- Boton Nuevo N.N -->
    <form action="{{ url('/pacientes/nn/create')}}">
        {{ csrf_field() }}

        <button type="submit" class="btn">
            <i class="fa fa-btn fa-trash"></i>Agregar Paciente N.N.
        </button>
    </form>
@endsection

@section('pagination')
    <div class="text-center">
        {{ $pacientes->links() }}
    </div>
@endsection
