@extends('layouts.index', ['resources' => $users, 'title' => "users"])

@section('campos_form_busqueda')
    <div class="form-group">
        <label for="filtro-nombre" class="col-sm-2 control-label">Nombre</label>
        <div class="col-sm-6">
            <input type="text" name="username" id="filtro-username" class="form-control">
        </div>
        <label for="filtro-nombre" class="col-sm-2 control-label">Activo</label>
        <div class="col-sm-1">
            <input type="checkbox" checked name="active" id="filtro-active" class="form-control">
        </div>
    </div>
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
@section('pagination')
<div class="text-center">
{{ $users->links() }}
</div>
@endsection
