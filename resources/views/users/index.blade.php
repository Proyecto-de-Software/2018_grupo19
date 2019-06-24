@extends('layouts.index', ['resources' => $users, 'title' => "users"])

@section('campos_form_busqueda')
    <div class="form-group">
        <label for="filtro-nombre" class="col-sm-2 control-label">Nombre</label>
        <div class="col-sm-6">
        <input type="text" name="username" id="filtro-username" class="form-control" value="{{app('request')->input('username')}}">
        </div>
        <label for="filtro-nombre" class="col-sm-2 control-label">Activo</label>
        <div class="col-sm-1">
            <input type="checkbox" @if (app('request')->input('search') == 'on' && app('request')->input('active') == '') @else checked @endif name="active" id="filtro-active" class="">
        </div>
    </div>
@endsection

@section('boton_listado_completo')
    <a href="{{ url('users') }}"><button class="btn btn-default">
        <i>Todos los usuarios</i>
    </button></a>
@endsection

@section('item-list')
    @foreach ($users as $resource)
        <tr>
            <td class="table-text"><div>{{ $resource->name }}</div></td>
            <td>
                <!-- Boton mas info -->
                @can('user_show')
                    <form action="{{ url('users/'.$resource->id) }}">
                        {{ csrf_field() }}

                        <button type="submit" class="btn">
                            <i class="fa fa-btn fa-trash"></i>Mas info
                        </button>
                    </form>
                @endcan
            </td>
        </tr>
    @endforeach
@endsection

@section('extra_buttons')
    <!-- Boton Nuevo -->
    <a class="btn btn-primary" role="button" href="{{ url("users/create")}}">
        Agregar usuario
    </a>
@endsection

@section('pagination')
<div class="text-center">
{{ $users->links() }}
</div>
@endsection
