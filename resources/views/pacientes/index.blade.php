@extends('layouts.index', ['resources' => $pacientes, 'title' => "pacientes"])

@section('campos_form_busqueda')
    <div class="form-group">
        <label for="filtro-nombre" class="col-sm-1 control-label">Nombre</label>
        <div class="col-sm-5">
            <input type="text" name="nombre" id="filtro-username" class="form-control">
        </div>
        <label for="filtro-apellido" class="col-sm-1 control-label">Apellido</label>
        <div class="col-sm-5">
            <input type="text" name="apellido" id="filtro-active" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label for="filtro-nro-doc" class="col-sm-2 control-label">Numero Doc.</label>
        <div class="col-sm-5">
            <input type="text" name="nro-doc" id="filtro-nro-doc" class="form-control">
        </div>
        <label for="filtro-tipo-doc" class="col-sm-2 control-label">Tipo Doc.</label>
        <div class="col-sm-3">
            <select name="tipo-doc" id="filtro-tipo-doc" class="form-control">
                <option value="0" selected></option>
                <option value="1">DNI</option>
                <option value="2">LC</option>
                <option value="3">CI</option>
                <option value="4">LE</option>
                <option value="5">Pasaporte</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="filtro-historia-clinica" class="col-sm-4 control-label">Numero de Historia Clinica</label>
        <div class="col-sm-7">
            <input type="text" name="historia-clinica" id="filtro-historia-clinica" class="form-control">
        </div>
    </div>
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
@section('pagination')
<div class="text-center">
{{ $pacientes->links() }}
</div>
@endsection
