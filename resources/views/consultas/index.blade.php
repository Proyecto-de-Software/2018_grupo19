@extends('layouts.index', ['resources' => $consultas, 'title' => "consultas"])

@section('search')@endsection

@section('item-list')
    @foreach ($consultas as $resource)
        <tr>
            <td class="table-text"><div>{{ $resource->fecha . ', ' . $resource->paciente->nombre . ' ' . $resource->paciente->apellido }}</div></td>
            <td>
                <!-- Boton mas info -->
                <form action="{{ url('consultas/'.$resource->id) }}">
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
{{ $consultas->links() }}
</div>
@endsection